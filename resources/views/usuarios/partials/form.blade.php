<div class="row">
    <label class="col-sm-3 form-control-label">Dados do Usuário</label>
    <div class="col-sm-9">
      <div class="form-group-material">
        <input id="register-name" type="text" name="name" value="{{ $user->name or old('name') }}" class="input-material">
        <label for="register-name" class="label-material">Nome</label>
    </div>
    <div class="form-group-material">
        <input id="register-email" type="text" name="email" value="{{ $user->email or old('email') }}"  class="input-material">
        <label for="register-email" class="label-material">E-mail</label>
    </div>
    <div class="form-group-material">
        <input id="register-password" type="password" name="password"  class="input-material">
        <label for="register-password" class="label-material">Senha</label>
    </div>  
    <div class="form-group-material">
        <input id="password-confirm" type="password" name="password_confirmation"  class="input-material">
        <label for="password-confirm" class="label-material">Confirmar Senha</label>
    </div> 

    <div class="form-group-material select">
        {!! Form::label('role', 'Papel do Usuário: ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::select('role[]', $roles, isset($user_roles) ? $user_roles : [], ['class' => 'form-control']) !!}
     </div>
 </div>                      
</div>
</div>