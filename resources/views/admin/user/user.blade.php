@extends('admin.layout')
@section('main-content')
    <div id="app" class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">User Page</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">User Page</li>
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
                        <h5 class="modal-title" id="staticBackdropLabel">User</h5>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-row">
                                {{--prfile--}}
                                <div class="form-group col-12">
                                    <center>
                                        <img :src="base64" style="width: 100px">
                                    </center>
                                    <label for="profile">Username</label>
                                    <input
                                        @input="base64Convert"
                                        type="file"
                                        class="form-control"
                                        id="profile"
                                        accept="image/*"
                                    >
                                </div>
                                {{--Username--}}
                                <div class="form-group col-12">
                                    <label for="Username">Username</label>
                                    <input v-model="form.username" type="text" class="form-control" id="Username">
                                </div>
                                {{--Email--}}
                                <div class="form-group col-12">
                                    <label for="Email">Email</label>
                                    <input v-model="form.email" type="email" class="form-control" id="Email">
                                </div>
                                {{--Password--}}
                                <div v-if="status == 'add'" class="form-group col-12">
                                    <label for="Password">Password</label>
                                    <input v-model="form.password" type="password" class="form-control" id="Password">
                                </div>
                                {{--Role--}}
                                <div class="form-group col-12">
                                    <label for="role">Role</label>
                                    <select v-model="form.role" class="form-control" id="role">
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                    </select>
                                </div>
                            </div>
                        </form>
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
                                            <th>Gender</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Position</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr
                                            v-for="(item, index) in user_list"
                                            :key="'user_list_'+index"
                                        >
                                            <td>[[ index + 1 ]]</td>
                                            <td>[[ item.name ]]</td>
                                            <td>Male</td>
                                            <td>09837363</td>
                                            <td>PhomPenh</td>
                                            <td>
                                                <strong style="text-transform: uppercase">[[ item.role ]]</strong>
                                            </td>
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
                user_list: [],
                base64: null,
                form: {
                    id: null,
                    username: null,
                    password: null,
                    email: '@mail.com',
                    role: 'user',
                    profile_base64: null
                }
            },
            methods: {
                fetchRecord() {
                    let vm = this
                    axios.get('/admin/fetchUserRecord')
                        .then(function (response) {
                            // handle success
                            vm.user_list = response.data
                        })
                },
                createRecord() {
                    let vm = this
                    let input = vm.form
                    axios.post('/admin/createUserRecord', input)
                        .then(function (response) {
                            // handle success
                            vm.fetchRecord()
                            vm.resetData()
                        })
                },
                updateRecord() {
                    let vm = this
                    let input = vm.form
                    axios.post('/admin/updateUserRecord', input)
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
                            axios.post('/admin/deleteUserRecord', {id: id},
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
                    this.form.username = item.name
                    this.form.email = item.email
                    this.form.role = item.role
                    this.showModal()
                },
                resetData() {
                    this.status = 'add'
                    this.form = {
                        id: null,
                        username: null,
                        password: null,
                        email: '@mail.com',
                        role: 'user',
                    }
                    this.hideModal()

                },
                base64Convert(e){
                    const file = e.target.files[0];
                    // Encode the file using the FileReader API
                    const reader = new FileReader();
                    reader.onloadend = () => {
                        // Use a regex to remove data url part
                        const base64String = reader.result
                        this.base64 = base64String
                        this.form.profile_base64 = base64String
                    };
                    reader.readAsDataURL(file);
                }
            }
        })
    </script>
@endsection
