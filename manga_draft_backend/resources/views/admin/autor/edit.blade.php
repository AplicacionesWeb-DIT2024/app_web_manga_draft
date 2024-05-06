@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.autor.actions.edit', ['name' => $autor->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <autor-form
                :action="'{{ $autor->resource_url }}'"
                :data="{{ $autor->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.autor.actions.edit', ['name' => $autor->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.autor.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </autor-form>

        </div>
    
</div>

@endsection