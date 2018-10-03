@extends('oxygencms::admin.layout')

@section('title', 'Pages')

@section('content')

    <div class="row">
        <div class="col-12 d-flex align-items-center mb-3">
            <h1>Pages</h1>

            <div class="ml-auto d-flex justify-content-end">
                <div>
                    <a href="{{ route('page.create') }}" class="btn">
                        Create <i class="far fa-edit"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-12">
            <vue-good-table
                    ref="vgt"
                    :rows="models"
                    :columns="[
                        {label: 'Title', field: 'title.en'},
                        {label: 'Slug', field: 'slug.en'},
                        {
                            label: 'Active', field: 'active',
                            globalSearchDisabled: true,
                            formatFn: formatActive,
                            width: '80px',
                            tdClass: 'pl-3',
                        },
                        {
                            label: 'Links',
                            field: 'links',
                            globalSearchDisabled: true,
                            sortable: false,
                            width: '130px',
                        },
                    ]"
                    theme="vgt-table striped condensed"
                    :search-options="{ enabled: true }"
                    :select-options="{
                        enabled: false,
                        sortable: false,
                        selectOnCheckboxOnly: true,
                    }"
                    @on-selected-rows-change="selectionChanged"
                    :pagination-options="{ enabled: true }"
            >
                <div slot="selected-row-actions">
                    <button @click="deleteSelectedRows">Delete</button>
                </div>

                <template slot="table-row" slot-scope="props">
                    <span v-if="props.column.field === 'links'">
                        <a :href="props.row.show_url" target="_blank">show</a>
                        <a :href="props.row.edit_url">edit</a>
                        <a href="#" @click.prevent="confirmAndDestroy(props.row)">delete</a>
                    </span>
                    <span v-else>@{{props.formattedRow[props.column.field]}}</span>
                </template>
            </vue-good-table>
        </div>
    </div>
@endsection