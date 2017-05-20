<?php

namespace CodeEduBook\Http\Controllers;

use CodeEduBook\Criteria\FindByAuthorCriteria;
use CodeEduBook\Criteria\FindByBookCriteria;
use CodeEduBook\Criteria\FindByTitle;
use CodeEduBook\Http\Requests\BookCreateRequest;
use CodeEduBook\Http\Requests\BookUpdateRequest;
use CodeEduBook\Http\Requests\BookRequest;
use CodeEduBook\Http\Requests\ChapterCreateRequest;
use CodeEduBook\Repositories\BookRepository;
use CodeEduBook\Repositories\ChapterRepository;
use Illuminate\Http\Request;
use CodeEduBook\Models\Book;

use CodeEduUser\Annotations\Mapping as Permission;

/**
 *
 * @Permission\ControllerAnnotation(name="chapter-admin", description="Chapters administration")
 */

class ChaptersController extends Controller
{
    private $repository;
    private $bookRepository;

    /**
     * BooksController constructor.
     * @param BookRepository $repository
     * @param ChapterRepository $categoryRepository
     */
    public function __construct(ChapterRepository  $repository,  BookRepository $bookRepository)
    {
        $this->repository = $repository;
        $this->bookRepository = $bookRepository;
        $this->bookRepository->pushCriteria(new FindByAuthorCriteria());

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @Permission\ActionAnnotation(name="list", description="Chapter list")
     */
    public function index(Request $request, Book $book)
    {
        $search = $request->get('search');
        //$book = $this->bookRepository->find($id);
        $this->repository->pushCriteria(new FindByBookCriteria($book->id));
        $chapters = $this->repository->paginate(5);
        return view('codeedubook::chapters.index', compact('chapters', 'search', 'book'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @Permission\ActionAnnotation(name="create", description="Chapter create")
     */
    public function create(Book $book)
    {
        //$book = $this->bookRepository->find($id);
        return view('codeedubook::chapters.create', compact('book'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @Permission\ActionAnnotation(name="store", description="Store Chapter")
     */
    public function store(ChapterCreateRequest $request, Book $book)
    {
        $data = $request->all();
        $data['book_id'] = $book->id;
        $this->repository->create($data);
        $url = $request->get('redirect_to', route('chapters.index',['book' => $book->id]));
        $request->session()->flash('message', 'Created successfully');
        return redirect()->to($url);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @Permission\ActionAnnotation(name="edit", description="Edit Chapter")
     */
    public function edit(Book $book, $chapterId)
    {
        $this->repository->pushCriteria(new FindByBookCriteria($book->id));
        $chapter = $this->repository->find($chapterId);
        return view('codeedubook::chapters.edit', compact('book', 'chapter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @Permission\ActionAnnotation(name="update", description="Update Chapter")
     */
    public function update(BookUpdateRequest $request, $id)
    {
        $data = $request->except(['author_id']);
        $book =  $this->repository->update($data, $id);
        $url = $request->get('redirect_to', route('books.index'));
        $request->session()->flash('message', 'Updated successfully');
        return redirect()->to($url);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @Permission\ActionAnnotation(name="destroy", description="Destroy Chapter")
     */
    public function destroy($id)
    {
        $this->repository->delete($id);
        \Session::flash('message', 'Deleted successfully');
        return redirect()->to(\URL::previous());

    }
}
