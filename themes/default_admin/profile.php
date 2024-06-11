<main>
	
    <!-- Content wrapper -->
    <div class="content-wrapper">
    <!-- Content -->
        <div class='container-xxl flex-grow-1 container-p-y'>
        <div class='row mt-5'>
            <div class='col-md-4'>
                <div class="card shadow">
                    <?php if (isset($profile['photo']) && file_exists("./".$profile['photo'])):?>
                    <img class="card-img-top" src="<?=BURL?><?=$profile['photo']?>" alt="Card image cap" />
                    <?php else:?>
                    <img class="card-img-top" src="<?=BURL?>assets/profile.jpg" alt="Card image cap" />
                    <?php endif; ?>
                    <div class="card-body">
                      <h5 class="card-title"><?=$profile['fullname'] ?></h5>
                      <p class="card-text"><?=$profile['bio']?></p>
                    </div>
                </div>
            </div>
            <div class='col-md-8 mt-2'>
                <div class="card mb-4 bg-secondary">
                    <h5 class="card-header">Profile Details</h5>
                    <!-- Account -->
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <div class="button-wrapper">
                                <a href="<?=BURL?>profile/change_photo" class="btn btn-primary mr-2">Change My Photo</a>
                                <a href="<?=BURL?>profile/change_password" class="btn btn-outline-primary">Change My Password</a>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body p-md-5 p-4">
                        <form id="formAccountSettings" method="POST" action="<?=BURL?>profile/action">
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="fullname" class="form-label">First Name</label>
                                <input class="form-control" type="text" id="fullname" name="fullname" value="<?=$profile['fullname']?>" autofocus/>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="email" class="form-label">Email</label>
                                <input class="form-control" type="text" name="email" id="email" value="<?=$profile['email']?>" disabled />
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="phoneNumber" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="phoneNumber" name="phone" value="<?=$profile['phone']?>" />
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?=$profile['address']?>" />
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="Bio" class="form-label">Bio</label>
                                <input type="text" class="form-control" id="bio" name="bio" placeholder="Bio" value="<?=$profile['bio']?>" />
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                            </div>
                        </div>
                        </form>
                    </div>
                    <!-- /Account -->
                    </div>
                </div>
            </div>
        </div>
    <!-- / Content -->
</main>