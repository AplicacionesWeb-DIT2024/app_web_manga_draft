<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Autor\BulkDestroyAutor;
use App\Http\Requests\Admin\Autor\DestroyAutor;
use App\Http\Requests\Admin\Autor\IndexAutor;
use App\Http\Requests\Admin\Autor\StoreAutor;
use App\Http\Requests\Admin\Autor\UpdateAutor;
use App\Models\Autor;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AutorsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexAutor $request
     * @return array|Factory|View
     */
    public function index(IndexAutor $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Autor::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nombre', 'apellido', 'fecha_nacimiento'],

            // set columns to searchIn
            ['id', 'nombre', 'apellido']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.autor.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.autor.create');

        return view('admin.autor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAutor $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreAutor $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Autor
        $autor = Autor::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/autors'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/autors');
    }

    /**
     * Display the specified resource.
     *
     * @param Autor $autor
     * @throws AuthorizationException
     * @return void
     */
    public function show(Autor $autor)
    {
        $this->authorize('admin.autor.show', $autor);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Autor $autor
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Autor $autor)
    {
        $this->authorize('admin.autor.edit', $autor);


        return view('admin.autor.edit', [
            'autor' => $autor,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAutor $request
     * @param Autor $autor
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateAutor $request, Autor $autor)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Autor
        $autor->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/autors'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/autors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyAutor $request
     * @param Autor $autor
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyAutor $request, Autor $autor)
    {
        $autor->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyAutor $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyAutor $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Autor::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
