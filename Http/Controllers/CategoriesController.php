<?php

namespace CodeEduBook\Http\Controllers;

use CodeEduBook\Http\Requests\CategoryCreateRequest;
use CodeEduBook\Http\Requests\CategoryUpdateRequest;
use CodeEduBook\Http\Requests\CategoryRequest;
use CodeEduBook\Repositories\CategoryRepository;
use CodeEduUser\Annotations\Mapping as Permission;

/**
 *
 * @Permission\ControllerAnnotation(name="category-admin", description="Categories administration")
 */

class CategoriesController extends Controller
{

    private $repository;

    /**
     * CategoriesController constructor.
     */
    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @Permission\ActionAnnotation(name="list", description="Category list")
     */
    public function index()
    {
        //$categories = Category::Trashed()->paginate(5);
        $categories = $this->repository->paginate(5);
        return view('codeedubook::categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @Permission\ActionAnnotation(name="create", description="Category create")
     */
    public function create()
    {
        return view('codeedubook::categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @Permission\ActionAnnotation(name="store", description="Category store")
     */
    public function store(CategoryCreateRequest $request)
    {
        $this->repository->create($request->all());
        $url = $request->get('redirect_to', route('categories.index'));
        $request->session()->flash('message', 'Created successfully');

         return redirect()->to($url);

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @Permission\ActionAnnotation(name="edit", description="Category edit")
     */
    public function edit($id)
    {

        $category = $this->repository->find($id);
        return view('codeedubook::categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @Permission\ActionAnnotation(name="update", description="Category update")
     */
    public function update(CategoryUpdateRequest $request, $id)
    {
        $this->repository->update($request->all(), $id);
        $url = $request->get('redirect_to', route('categories.index'));
        $request->session()->flash('message', 'Updated successfully');
        return redirect()->to($url);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @Permission\ActionAnnotation(name="destroy", description="Category destroy")
     */
    public function destroy($id)
    {

        $this->repository->delete($id);
        \Session::flash('message', 'Deleted successfully');
        return redirect()->to(\URL::previous());
    }
}
