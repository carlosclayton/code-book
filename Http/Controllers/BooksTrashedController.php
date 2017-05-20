<?php

namespace CodeEduBook\Http\Controllers;

use CodeEduBook\Criteria\FindByAuthorCriteria;
use CodeEduBook\Criteria\FindByTitle;
use CodeEduBook\Criteria\FindByTitleCriteria;
use CodeEduBook\Criteria\FindOnlyTrashedCriteria;
use CodeEduBook\Http\Requests\BookCreateRequest;
use CodeEduBook\Http\Requests\BookUpdateRequest;
use CodeEduBook\Models\Book;
use CodeEduBook\Http\Requests\BookRequest;
use CodeEduBook\Repositories\BookRepository;
use CodeEduBook\Repositories\CategoryRepository;
use CodeEduBook\Repositories\RepositoryRestoreTrait;
use Illuminate\Http\Request;
use CodeEduUser\Annotations\Mapping as Permission;

/**
 *
 * @Permission\ControllerAnnotation(name="book-trashed-admin", description="Books trashed administration")
 */

class BooksTrashedController extends Controller
{
    use RepositoryRestoreTrait;
    private $repository;
    private $categoryRepository;
    /**
     * BooksController constructor.
     */
    public function __construct(BookRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @Permission\ActionAnnotation(name="list", description="Edit book trashed")
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        //$this->repository->pushCriteria(FindOnlyTrashedCriteria::class);

        $books = $this->repository->onlyTrashed()->paginate(5);
        return view('trashed.books.index', compact('books', 'search'));
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @Permission\ActionAnnotation(name="show", description="Show book trashed")
     */
    public function show($id){
        $this->repository->onlyTrashed();
        $book = $this->repository->find($id);
        return view('trashed.books.show', compact('book'));
    }


    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @Permission\ActionAnnotation(name="update", description="Update book trashed")
     */
    public function update(Request $request, $id){

        $this->repository->onlyTrashed();

        $this->repository->restore($id);
        $url = $request->get('redirect_to', route('books.index'));
        $request->session()->flash('message', 'Restored successfully');
        return redirect()->to($url);

    }

}
