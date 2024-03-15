<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="loginModalLabel">Connexion</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <!-- Ajoutez ici votre formulaire de connexion -->
                 <form method="post" action="@Url.Action("Login", "Customers")">
                     <div class="mb-3">
                         <label for="loginInput" class="form-label">Login</label>
                         <input type="text" name="login" class="form-control" id="loginInput" placeholder="Login">
                     </div>
                     <div class="mb-3">
                         <label for="passwordInput" class="form-label">Mot de passe</label>
                         <input type="password" name="password" class="form-control" id="passwordInput" placeholder="Password">
                     </div>
                     <!-- Autres champs de formulaire de connexion -->
                     <button type="submit" class="btn btn-primary">Se connecter</button>
                 </form>
             </div>
         </div>
     </div>
 </div>