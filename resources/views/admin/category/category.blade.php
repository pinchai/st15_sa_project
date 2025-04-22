@extends('admin.layout')
@section('main-content')
    <div id="app" class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Category Page</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Category Page</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Modal -->
        <div
            class="modal fade"
            id="staticBackdrop"
            data-backdrop="static"
            data-keyboard="false"
            tabindex="-1"
            aria-labelledby="staticBackdropLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Category</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            {{--name--}}
                            <div class="form-group col-12">
                                <label for="name">Name</label>
                                <input v-model="form.name" type="text" class="form-control" id="name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 p-3">
                            <hr>
                            <button
                                @click="resetData()"
                                type="button"
                                style="float: left"
                                class="btn btn-danger"
                            >
                                <i class="far fa-window-close"></i>
                                Cancel
                            </button>
                            {{--save--}}
                            <button
                                @click="createRecord()"
                                v-if="status == 'add'"
                                type="button"
                                class="btn btn-primary"
                                style="float: right"
                            >
                                <i class="far fa-save"></i>
                                Save
                            </button>
                            {{--edit--}}
                            <button
                                @click="updateRecord()"
                                v-if="status == 'edit'"
                                type="button"
                                class="btn btn-primary"
                                style="float: right"
                            >
                                <i class="far fa-save"></i>
                                Update
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a
                                    href="#"
                                    class="btn btn-sm btn-secondary"
                                    @click="fetchRecord()"
                                >
                                    <i class="fas fa-redo"></i>
                                    Refresh
                                </a>

                                <a
                                    href="#"
                                    class="btn btn-sm btn-primary"
                                    @click="showModal()"
                                >
                                    <i class="fas fa-plus-circle"></i>
                                    Add
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-sm table-borderless table-striped">
                                        <thead>
                                        <tr class="bg-primary">
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr
                                            v-for="(item, index) in category_list"
                                            :key="'category_list'+index"
                                        >
                                            <td>[[ index + 1 ]]</td>
                                            <td>[[ item.name ]]</td>
                                            <td>
                                                <a
                                                    @click="getEdit(item)"
                                                    href="#"
                                                    class="btn btn-secondary"
                                                >
                                                    <i class="fas fa-edit"></i>
                                                    Edit
                                                </a>
                                                <a
                                                    @click="deleteRecord(item.id)"
                                                    href="#"
                                                    class="btn btn-danger"
                                                >
                                                    <i class="fas fa-trash"></i>
                                                    Delete
                                                </a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        var app = new Vue({
            el: '#app',
            delimiters: ['[[', ']]'],
            created() {
                this.fetchRecord()
            },
            data: {
                status: 'add',
                category_list: [],
                form: {
                    id: null,
                    name: null,
                }
            },
            methods: {
                fetchRecord() {
                    let vm = this
                    axios.get('/admin/fetchCategoryRecord')
                        .then(function (response) {
                            // handle success
                            vm.category_list = response.data
                        })
                },
                createRecord() {
                    let vm = this
                    let input = vm.form
                    axios.post('/admin/createCategoryRecord', input)
                        .then(function (response) {
                            // handle success
                            vm.fetchRecord()
                            vm.resetData()
                        })
                },
                updateRecord() {
                    let vm = this
                    let input = vm.form
                    axios.post('/admin/updateCategoryRecord', input)
                        .then(function (response) {
                            // handle success
                            vm.fetchRecord()
                            vm.resetData()
                        })
                },
                deleteRecord(id) {
                    Swal.fire({
                        icon: "question",
                        title: "Do you want to delete ?",
                        showCancelButton: true,
                        confirmButtonText: "Yes Delete",
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            let vm = this
                            axios.post('/admin/deleteCategoryRecord', {id: id},
                                {
                                    headers: {
                                        'Content-Type': 'application/json',
                                    }
                                }
                            )
                                .then(function (response) {
                                    // handle success
                                    if (response.status == 200) {
                                        vm.fetchRecord()
                                    }
                                })
                        } else if (result.isDenied) {
                            Swal.fire("Changes are not saved", "", "info");
                        }
                    });
                },
                showModal() {
                    $('#staticBackdrop').modal('show')
                },
                hideModal() {
                    $('#staticBackdrop').modal('hide')
                },
                getEdit(item) {
                    this.status = 'edit'
                    this.form.id = item.id
                    this.form.name = item.name
                    this.showModal()
                },
                resetData() {
                    this.status = 'add'
                    this.form = {
                        id: null,
                        name: null,
                    }
                    this.hideModal()

                },
            }
        })
    </script>
@endsection
