<?php $this->layout("layouts/default", ["title" => APPNAME, "user" => $user]) ?>

<?php $this->start("page") ?>

<div class="container content">
    <button type="button" class="btn btn-primary btn-modal" id="openModal" data-toggle="modal" data-target="#addPictureModal">
        Add new picture
    </button>
        <br>
        <br>
        <div class="jumbotron mb-2">
            <center>
                <h1><i class="fa fa-camera-retro"></i> Make Your Image Gallary</h1>
                <p>Just a Gallary Full of Beautiful Images </p>
            </center>
        </div>
        <div class="portfolio-item row">
        <?php foreach ($posts as $post): ?>
            <div class="col col-lg-4 col-md-6 col-xl-3 col-12 mb-2">
                <a href="<?= $this->e($post->img) ?>" title="<?= $this->e($post->title) ?>" user="<?=$this->e($post->user->id)?>" username="<?=$this->e($post->user->name)?>"
                    class="fancylight popup-btn" data-fancybox-group="light">
                    <img class="img-fluid w-100" style="max-height: 200px;" src="<?= $this->e($post->img) ?>" alt="">
                </a>
            </div>
        <?php endforeach ?>
        </div>
</div>

    <!-- Button trigger modal -->
</div>
<!-- Modal -->
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
<?php $this->stop() ?>
