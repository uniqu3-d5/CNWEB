<?php $this->layout("layouts/default", ["title" => APPNAME, 'user' => $user]) ?>

<?php $this->start("page") ?>
<main class="h-100 gradient-custom-2 content">
        <br>
        <div class="container-fuild">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-10 col-12">
                    <div class="container">
                        <div class="rounded-top d-flex flex-row">
                            <div class="ms-4 d-flex flex-column" style="width: 150px;">
                                <img src="<?php if($user->avt) {echo $user->avt; }else{ echo '/img/default.jpg';} ?>"
                                    alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                                    style="width: 150px; z-index: 1">                            </div>
                            <div class="ms-3" style="margin-top: 130px;">
                                <h5><?= $this->e($user->name) ?></h5>
                            </div>
                        </div>
                        <div class="p-4 pb-0">
                            <button type="button" class="btn btn-primary" id="openModal" data-toggle="modal" data-target="#addPictureModal">
                                Add new picture
                            </button>
                            <button type="button" class="btn btn-primary" id="editProfile" data-toggle="modal" data-target="#editProfileModal">
                                Edit profile
                            </button>
                        </div>
                        <div class="p-4 text-black">
                            <br>

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <p class="lead fw-normal mb-0">Recent photos</p>
                            </div>
                            <div class="row">
                            <?php foreach($posts as $post): ?>
                                <div class="col col-md-6 col-xl-4 col-12 mb-0">
                                    <a href="<?= $this->e($post->img) ?>" title="<?= $this->e($post->title) ?>" user="<?=$this->e($post->user->id)?>" username="<?=$this->e($post->user->name)?>"
                                        class="fancylight popup-btn" data-fancybox-group="light">
                                        <img class="img-fluid w-100" style="height: 200px;"
                                            src="<?= $this->e($post->img) ?>"
                                            alt="">
                                    </a>
                                    <div class="d-flex justify-content-end del-pic ">
                                        <button class="bg-danger del-picture" data-id="<?= $this->e($post->id) ?>"><i class="far fa-trash-alt"></i></button>
                                    </div>
                                </div>
                            <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>
<!-- Modal post new Post -->
<div class="modal fade" id="addPictureModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form class="mt-5" id="form-img">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add new picture</h5>
        <button type="button" class="close close-modal" data-dismiss="#addPictureModal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group mb-2">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp" placeholder="Enter title">
          </div>
          <div class="form-group mb-2">
            <input type="file" name="file" id="img">
          </div>
          <div class="form-group mb-2">
            <img src="" class="img-thumbnail" id="preview">
          </div>
          <div class="form-group mb-2">
            <p class="text-danger text-center" id="error"></p>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary close-modal" data-dismiss="#addPictureModal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
    </form>
  </div>
</div>

<!-- Edit profile -->


<div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form class="mt-5" id="editProfileForm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit profile</h5>
        <button type="button" class="close close-modal" data-dismiss="#editProfileModal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group mb-2">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" value="<?= $this->e($user->name) ?>">
          </div>
          <div class="form-group mb-2">
            <label for="avt">Avatar</label>
            <input type="file" name="file" id="avt">
          </div>
          <div class="form-group mb-2">
            <img src="" class="img-thumbnail" id="preview">
          </div>
          <div class="form-group mb-2">
            <p class="text-danger text-center" id="error-profile"></p>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary close-modal" data-dismiss="#editProfileModal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
    </form>
  </div>
</div>

<?php $this->stop() ?>
