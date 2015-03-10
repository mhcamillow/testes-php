<?php
require_once('cabecalho.php');
?>
<div class="container">
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Entrar</div>
                <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Esqueceu sua senha?</a></div>
            </div>
            <div style="padding-top:30px" class="panel-body" >
                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                <form id="loginform" action="login.php" class="form-horizontal" role="form" method="post">
                    
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="login" type="text" class="form-control" name="login" value="" placeholder="Usuário">
                    </div>
                    
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" class="form-control" name="password" placeholder="Senha">
                    </div>
                    
                    <div style="margin-top:10px" class="form-group">
                        <!-- Button -->
                        <div class="col-sm-12 controls">
                            <button class="btn btn-success" type="submit">Entrar  </button>  
                            <!--<a type="submit" id="btn-login" class="btn btn-success">Entrar   </a>-->
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 control">
                            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                Não possui uma conta?
                                <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                    Cadastre-se aqui
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Cadastrar</div>
                <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>
            </div>
            <div class="panel-body" >
                <form id="signupform" class="form-horizontal" role="form" method="post" action="cadastroUsuario.php">
                    <div class="form-group">
                        <label for="nome" class="col-md-3 control-label">Usuário</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="nomcom" placeholder="Usuário">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nome" class="col-md-3 control-label">Login</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="nomusu" placeholder="Login">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-md-3 control-label">Senha</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="senusu" placeholder="Senha">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-md-3 control-label">E-mail</label>
                        <div class="col-md-9">
                            <input type="email" class="form-control" name="emausu" placeholder="E-mail">
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-md-3 control-label">Data de nascimento</label>
                        <div class="col-md-9">
                            <input type="date" class="form-control" name="datnas" placeholder="DD/MM/YYYY">
                        </div>
                    </div>

                    <div class="form-group">
                        <!-- Button -->
                        <div class="col-md-offset-3 col-md-9">
                            <button id="btn-signup" type="submit" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Cadastrar</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
        
        
        
    </div>
</div>

<?php include('rodape.php') ?>