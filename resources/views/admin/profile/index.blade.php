@extends('admin.layout.master')

@section('content')

 <section class="section">
          <div class="section-header">
            <h1>Meus Dados</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Painel</a></div>
              <div class="breadcrumb-item">Perfil</div>
            </div>
          </div>
          <div class="section-body">

            <div class="row mt-sm-4">
                {{--- Inicio do bloco 1 edit perfil---}}
              <div class="col-12 col-md-12 col-lg-7">
                 @if (session('sucesso'))
                    <div class="alert alert-success">{{ session('sucesso') }}</div>
                 @endif

                <div class="card">
                  <form action="{{ route('admin.profile.update') }}" method="post" class="needs-validation" novalidate="" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                      <h4>Actualizar Perfil</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                          <div class="form-group col-12">

                            <div class="mb-3">
                                @if(Auth::user()->image != null)
                               <img src="{{ asset(Auth::user()->image) }}" class="img-fluid" style="width: 80px; height:80px; object-fit:cover; border-radius:50%;" alt="{{ Auth::user()->name }}">
                               @else()
                               <img src="{{ asset('backend/assets/img/avatar/avatar-1.png') }}" class="img-fluid" style="width: 80px; height:80px; object-fit:cover; border-radius:50%;" alt="{{ Auth::user()->name }}">
                               @endif()
                            </div>

                            <label>Foto de Perfil</label>
                            <input type="file" class="form-control" name="image">

                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Nome</label>
                            <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required="">

                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>E-mail</label>
                            <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" required="">

                          </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                      <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                  </form>
                </div>
              </div>
               {{--- Fim do bloco 1---}}

                {{--- Inicio do bloco 2 edit perfil---}}
              <div class="col-12 col-md-12 col-lg-7">
                 @if ($errors->any())
                 @foreach ($errors->all() as $error )
                    <div class="alert alert-danger">{{ $error  }}</div>
                 @endforeach
                 @endif

                 @if (session('sucessoSenha'))
                    <div class="alert alert-success">{{ session('sucessoSenha') }}</div>
                 @endif

                <div class="card">
                  <form action="{{ route('admin.profile.password') }}" method="post" class="needs-validation" novalidate="" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                      <h4>Actualizar Senha</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">

                          <div class="form-group col-12">
                           <label>Senha Actual</label>
                            <input type="password" class="form-control" name="current_password" placeholder="Digite sua senha actual ">
                        </div>

                          <div class="form-group col-12">
                           <label>Nova Senha</label>
                            <input type="password" class="form-control" name="password" placeholder="Digite sua nova senha, com 8 caracteres no minimo">
                        </div>

                          <div class="form-group col-12">
                           <label>Confirmar Nova Senha</label>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirme sua nova senha">
                        </div>

                     </div>
                    </div>
                    <div class="card-footer text-right">
                      <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                  </form>
                </div>
              </div>
               {{--- Fim do bloco 2---}}
            </div>
          </div>
        </section>

@endsection
