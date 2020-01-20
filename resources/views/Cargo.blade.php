    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />

    </head>
    <body>
    <div class="container" id="app">
        <div class="row justify-content-center">
            <div class="col-md-12 text-left">
                <h1>Биржа грузов</h1>
            </div>
        </div>
        {{--Add new cargo--}}
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCargoModal">
                            Добавить
                        </button>
                        {{--MODAL--}}
                        <div class="modal fade" id="addCargoModal" tabindex="-1" role="dialog"
                             aria-labelledby="cargoModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="cargoModalLabel">Добавить груз</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="#" method="post">
                                            <div class="form-group">
                                                <label for="post-name" class="label">Название груза</label>
                                                <input type="text" name="name" v-model="name" class="form-control"
                                                       id="cargo-name">
                                            </div>
                                            <div class="form-group">
                                                <label for="post-weight" class="label">Вес в тоннах</label>
                                                <input type="text" name="weight" v-model="weight" class="form-control"
                                                       id="cargo-weight">
                                            </div>
                                            <div class="form-group">
                                                <label for="cargo-from" class="label">Город загрузки</label>
                                                <select class="form-control " name="cities[]" id="cargo-from"
                                                        v-model="from_city_id">
                                                    @foreach($cities as $id_city=>$city)
                                                        <option
                                                            value="{{ $id_city }} {{ in_array($id_city, old('categories', [])) ? 'selected' : '' }}">
                                                            {{ $city }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="cargo-to" class="label">Город Доставки</label>
                                                <select class="form-control " name="cities[]" id="cargo-to"
                                                        v-model="to_city_id">
                                                    @foreach($cities as $id_city=>$city)
                                                        <option
                                                            value="{{ $id_city }} {{ in_array($id_city, old('categories', [])) ? 'selected' : '' }}">
                                                            {{ $city }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="post-route" class="label">дата доставки</label>
                                                <input type="date" name="delivery_date" v-model="delivery_date"
                                                       class="form-control"
                                                       id="cargo-date">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button class="btn btn-primary" @click="addCargo()" data-dismiss="modal">
                                            SAVE
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--Show all Posts--}}
        <div class="row justify-content-center">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        Всего: @{{ loads.length }} грузов
                    </div>
                </div>
                {{--LIST All Cargo in AKKORDION--}}
                <div class="accordion" id="accordionExample">
                    <div class="card" v-for="(load,index) in loads">
                        <div class="card-header" v-bind:id="'heading' + load.id">
                            <h5 class="mb-0 text-center">
                                <button class="btn btn-link btn-lg btn-block collapsed" type="button" data-toggle="collapse"
                                        v-bind:data-target="'#Cargo' + load.id" aria-expanded="true"
                                        v-bind:aria-controls="'Cargo' + load.id">
                                    <table class="table" id="AllCargoesTable">
                                        <tr>
                                            <td>@{{load.delivery_date}}</td>
                                            <td>@{{load.city_from.city_name}} – @{{load.city_to.city_name}}</td>
                                            <td>@{{load.name}}</td>
                                            <td>@{{load.weight}}</td>
                                        </tr>
                                    </table>
                                </button>
                            </h5>
                        </div>
                        <div v-bind:id="'Cargo' + load.id" class="collapse show"
                             v-bind:aria-labelledby="'heading' + load.id" data-parent="#accordionExample">
                            <div class="card-body text-center">
                                <img src="{{ asset('storage/cargoMap/maps-750x429.webp') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    <script src="{{asset('js/app.js')}}"></script>
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                errorMsg: '',
                name: '',
                successMsg: '',
                from_city_id: '',
                to_city_id: '',
                weight: '',
                delivery_date: '',
                loads: [],
            },
            mounted: function () {
                this.getAllPosts();
            },
            methods: {
                getAllPosts() {
                    axios.get('/api').then(function (response) {
                        if (response.data.exception) {
                            app.errorMsg = response.data.message;
                            console.log(response);
                        } else {
                            app.loads = response.data.cargoes;
                            console.log(app.loads)
                        }
                    });
                },
                addCargo() {
                    console.log('HEY')
                    axios.post('/api/create', {
                        name: app.name,
                        from_city_id: app.from_city_id,
                        to_city_id: app.to_city_id,
                        weight: app.weight,
                        delivery_date: app.delivery_date,
                    }).then(function (response) {
                        if (error.response) {

                        } else {
                            app.getAllPosts();
                            app.successMsg = response.data.message;
                            console.log('success')
                        }
                    });
                },
            }
        });
    </script>
    </body>
    </html>
