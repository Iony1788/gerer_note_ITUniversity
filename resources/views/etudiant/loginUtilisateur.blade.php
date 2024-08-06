@include('partials.script')
<section style="height:100%" class="">
    <div class="login">
        <h3 class="text-center text-white pt-3">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-5 px-3 py-5 bg-light rounded shadow m-4">
                    <div id="login-box" class="col-md-12 ">
                        <form id="login-form" class="form" action="{{Route('loginClientPost')}}" method="post">
                        @csrf
                        <div class="d-flex justify-content-center align-items-center">
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                <h3 class="text-center perso bg-info d-flex align-items-center justify-content-center">
                  <i class="fa fa-user fa-1x"></i>
                </h3>
                </div>
                <div class="form-group">
                    <label for="number" class="text-dark">Numero</label><br>
                    <input type="text" name="id_etudiant" value="{{ old('id_etudiant') }}" id="id_etudiant" class="form-control">
                </div>
                <div class="form-group row px-3 mt-3">
                    <input type="submit" name="submit" class="btn btn-info btn-md btn-block" value="Se connecter">
                </div>
              </form>
            </div>
                </div>
            </div>
        </div>
    </div>
</section>