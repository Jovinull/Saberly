<!doctype html>
<html lang="pt-BR">

<head>
	@include('backend.section.link')

	<title>Saberly - Acesso Administrativo</title>
</head>

<body class="">
	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-cover">
			<div class="">
				<div class="row g-0">

					<div
						class="col-12 col-xl-7 col-xxl-8 auth-cover-left align-items-center justify-content-center d-none d-xl-flex">

						<div class="card shadow-none bg-transparent rounded-0 mb-0">
							<div class="card-body">
								<img src="{{ asset('backend/assets/images/login-images/login-cover.svg') }}"
									class="img-fluid auth-img-cover-login" width="650" alt="Ilustração de acesso ao painel do Saberly" />
							</div>
						</div>

					</div>

					<div class="col-12 col-xl-5 col-xxl-4 auth-cover-right align-items-center justify-content-center">
						<div class="card rounded-0 m-3 shadow-none bg-transparent mb-0">
							<div class="card-body p-sm-5">
								<div class="">
									<div class="mb-3 text-center">
										<img src="{{ asset('backend/assets/images/logo-icon.png') }}" width="60"
											alt="Logo do Saberly" />
									</div>

									<div class="text-center mb-4">
										<h5 class="">Saberly Admin</h5>
										<p class="mb-0">Acesse sua conta para gerenciar a plataforma</p>
									</div>

									<div class="form-body">
										<form class="row g-3">
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">E-mail</label>
												<input type="email" class="form-control" id="inputEmailAddress"
													placeholder="seuemail@exemplo.com">
											</div>

											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Senha</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" class="form-control border-end-0"
														id="inputChoosePassword"
														placeholder="Digite sua senha">
													<a href="javascript:;" class="input-group-text bg-transparent" aria-label="Mostrar/ocultar senha">
														<i class="bx bx-hide"></i>
													</a>
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox"
														id="flexSwitchCheckChecked">
													<label class="form-check-label"
														for="flexSwitchCheckChecked">Manter conectado</label>
												</div>
											</div>

											<div class="col-md-6 text-end">
												<a href="authentication-forgot-password.html">Esqueci minha senha</a>
											</div>

											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary">Entrar</button>
												</div>
											</div>

											<div class="col-12">
												<div class="text-center">
													<p class="mb-0">Ainda não tem uma conta?
														<a href="authentication-signup.html">Cadastre-se</a>
													</p>
												</div>
											</div>
										</form>
									</div>

									<div class="login-separater text-center mb-5">
										<span>OU ENTRE COM</span>
										<hr>
									</div>

									<div class="list-inline contacts-social text-center">
										<a href="javascript:;"
											class="list-inline-item bg-facebook text-white border-0 rounded-3"
											aria-label="Entrar com Facebook">
											<i class="bx bxl-facebook"></i>
										</a>
										<a href="javascript:;"
											class="list-inline-item bg-twitter text-white border-0 rounded-3"
											aria-label="Entrar com Twitter">
											<i class="bx bxl-twitter"></i>
										</a>
										<a href="javascript:;"
											class="list-inline-item bg-google text-white border-0 rounded-3"
											aria-label="Entrar com Google">
											<i class="bx bxl-google"></i>
										</a>
										<a href="javascript:;"
											class="list-inline-item bg-linkedin text-white border-0 rounded-3"
											aria-label="Entrar com LinkedIn">
											<i class="bx bxl-linkedin"></i>
										</a>
									</div>

								</div>
							</div>
						</div>
					</div>

				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->

	{{-- Scripts centralizados --}}
	@include('backend.section.script')
</body>

</html>
