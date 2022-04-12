<div class="container-fluid h-custom">
  <div class="row d-flex justify-content-center align-items-center h-100">

    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
      <form method="post">

        <!-- Email input -->
        <div class="form-contener mb-4">
          <input type="email" name="email" id="email" class="form-escape" required />
          <label class="form-label" for="email">Enter a valid email address</label>
        </div>

        <!-- Password input -->
        <div class="form-contener mb-3">
          <input type="password" name="password" id="password" class="form-escape" placeholder="Enter password" required />
          <label class="form-label" for="password">Enter password</label>
        </div>

        <div class="d-flex justify-content-between align-items-center">
          <!-- Checkbox -->
          <div class="form-contener mb-0">
            <label class="form-check-label row " for="checkbox">
              <input class="form-check-input me-2" name="checkbox" type="checkbox" value="" id="checkbox" />
              <span>
                <span></span>
              </span>
              Créer un nouveau compte
            </label>
          </div>
        </div>

        <div class="text-center text-lg-start mt-4 pt-2">
          <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;" name="submit">Login </button>
        </div>

      </form>
    </div>
  </div>
</div>