@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.bien.actions.index'))

@section('body')

    <bien-listing
        :data="{{ $data->toJson() }}"
        :url="'{{ url('admin/biens') }}'"
        inline-template>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{ trans('admin.bien.actions.index') }}
                        <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0" href="{{ url('admin/biens/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.bien.actions.create') }}</a>
                    </div>
                    <div class="card-body" v-cloak>
                        <div class="card-block">
                            <form @submit.prevent="">
                                <div class="row justify-content-md-between">
                                    <div class="col col-lg-7 col-xl-5 form-group">
                                        <div class="input-group">
                                            <input class="form-control" placeholder="{{ trans('brackets/admin-ui::admin.placeholder.search') }}" v-model="search" @keyup.enter="filter('search', $event.target.value)" />
                                            <span class="input-group-append">
                                                <button type="button" class="btn btn-primary" @click="filter('search', search)"><i class="fa fa-search"></i>&nbsp; {{ trans('brackets/admin-ui::admin.btn.search') }}</button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-auto form-group ">
                                        <select class="form-control" v-model="pagination.state.per_page">
                                            
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                </div>
                            </form>

                            <table class="table table-hover table-listing">
                                <thead>
                                    <tr>
                                        <th class="bulk-checkbox">
                                            <input class="form-check-input" id="enabled" type="checkbox" v-model="isClickedAll" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element" @click="onBulkItemsClickedAllWithPagination()">
                                            <label class="form-check-label" for="enabled">
                                                #
                                            </label>
                                        </th>

                                        <th is='sortable' :column="'id'">{{ trans('admin.bien.columns.id') }}</th>
                                        <th is='sortable' :column="'libelle'">{{ trans('admin.bien.columns.libelle') }}</th>
                                        <th is='sortable' :column="'adresse'">{{ trans('admin.bien.columns.adresse') }}</th>
                                        <th is='sortable' :column="'prix'">{{ trans('admin.bien.columns.prix') }}</th>
                                        <th is='sortable' :column="'type'">{{ trans('admin.bien.columns.type') }}</th>
                                        <th is='sortable' :column="'surface'">{{ trans('admin.bien.columns.surface') }}</th>
                                        <th is='sortable' :column="'description'">{{ trans('admin.bien.columns.description') }}</th>
                                        <th is='sortable' :column="'image'">{{ trans('admin.bien.columns.image') }}</th>
                                        <th is='sortable' :column="'id_user'">{{ trans('admin.bien.columns.id_user') }}</th>
                                        <th is='sortable' :column="'id_agence'">{{ trans('admin.bien.columns.id_agence') }}</th>
                                        <th is='sortable' :column="'id_typebien'">{{ trans('admin.bien.columns.id_typebien') }}</th>
                                        <th is='sortable' :column="'id_statut_bien'">{{ trans('admin.bien.columns.id_statut_bien') }}</th>
                                        <th is='sortable' :column="'id_etat_bien'">{{ trans('admin.bien.columns.id_etat_bien') }}</th>
                                        <th is='sortable' :column="'id_localite'">{{ trans('admin.bien.columns.id_localite') }}</th>

                                        <th></th>
                                    </tr>
                                    <tr v-show="(clickedBulkItemsCount > 0) || isClickedAll">
                                        <td class="bg-bulk-info d-table-cell text-center" colspan="16">
                                            <span class="align-middle font-weight-light text-dark">{{ trans('brackets/admin-ui::admin.listing.selected_items') }} @{{ clickedBulkItemsCount }}.  <a href="#" class="text-primary" @click="onBulkItemsClickedAll('/admin/biens')" v-if="(clickedBulkItemsCount < pagination.state.total)"> <i class="fa" :class="bulkCheckingAllLoader ? 'fa-spinner' : ''"></i> {{ trans('brackets/admin-ui::admin.listing.check_all_items') }} @{{ pagination.state.total }}</a> <span class="text-primary">|</span> <a
                                                        href="#" class="text-primary" @click="onBulkItemsClickedAllUncheck()">{{ trans('brackets/admin-ui::admin.listing.uncheck_all_items') }}</a>  </span>

                                            <span class="pull-right pr-2">
                                                <button class="btn btn-sm btn-danger pr-3 pl-3" @click="bulkDelete('/admin/biens/bulk-destroy')">{{ trans('brackets/admin-ui::admin.btn.delete') }}</button>
                                            </span>

                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in collection" :key="item.id" :class="bulkItems[item.id] ? 'bg-bulk' : ''">
                                        <td class="bulk-checkbox">
                                            <input class="form-check-input" :id="'enabled' + item.id" type="checkbox" v-model="bulkItems[item.id]" v-validate="''" :data-vv-name="'enabled' + item.id"  :name="'enabled' + item.id + '_fake_element'" @click="onBulkItemClicked(item.id)" :disabled="bulkCheckingAllLoader">
                                            <label class="form-check-label" :for="'enabled' + item.id">
                                            </label>
                                        </td>

                                    <td>@{{ item.id }}</td>
                                        <td>@{{ item.libelle }}</td>
                                        <td>@{{ item.adresse }}</td>
                                        <td>@{{ item.prix }}</td>
                                        <td>@{{ item.type }}</td>
                                        <td>@{{ item.surface }}</td>
                                        <td>@{{ item.description }}</td>
                                        <td>@{{ item.image }}</td>
                                        <td>@{{ item.id_user }}</td>
                                        <td>@{{ item.id_agence }}</td>
                                        <td>@{{ item.id_typebien }}</td>
                                        <td>@{{ item.id_statut_bien }}</td>
                                        <td>@{{ item.id_etat_bien }}</td>
                                        <td>@{{ item.id_localite }}</td>
                                        
                                        <td>
                                            <div class="row no-gutters">
                                                <div class="col-auto">
                                                    <a class="btn btn-sm btn-spinner btn-info" :href="item.resource_url + '/edit'" title="{{ trans('brackets/admin-ui::admin.btn.edit') }}" role="button"><i class="fa fa-edit"></i></a>
                                                </div>
                                                <form class="col" @submit.prevent="deleteItem(item.resource_url)">
                                                    <button type="submit" class="btn btn-sm btn-danger" title="{{ trans('brackets/admin-ui::admin.btn.delete') }}"><i class="fa fa-trash-o"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="row" v-if="pagination.state.total > 0">
                                <div class="col-sm">
                                    <span class="pagination-caption">{{ trans('brackets/admin-ui::admin.pagination.overview') }}</span>
                                </div>
                                <div class="col-sm-auto">
                                    <pagination></pagination>
                                </div>
                            </div>

                            <div class="no-items-found" v-if="!collection.length > 0">
                                <i class="icon-magnifier"></i>
                                <h3>{{ trans('brackets/admin-ui::admin.index.no_items') }}</h3>
                                <p>{{ trans('brackets/admin-ui::admin.index.try_changing_items') }}</p>
                                <a class="btn btn-primary btn-spinner" href="{{ url('admin/biens/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.bien.actions.create') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </bien-listing>

@endsection