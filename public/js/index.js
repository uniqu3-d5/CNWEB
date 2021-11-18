const getBase64 = (file) => {
  return new Promise((resolve, reject) => {
    const reader = new FileReader();
    reader.onload = () => resolve(reader.result);
    reader.onerror = (error) => reject(error);
    reader.readAsDataURL(file);
  });
};
const isValidImg = (img) => {
  const extensions = ["jpeg", "png", "gif", "jpg"];
  const typeImg = img.type.split("/")[1];
  if (extensions.indexOf(typeImg) === -1) {
    return { status: false, msg: "Image allow .jpeg .png .gif .jpg" };
  }
  if (img.size > 1000000) {
    return { status: false, msg: "Picture is too large" };
  }
  return { status: true };
};

$('.portfolio-menu ul li').click(function () {
    $('.portfolio-menu ul li').removeClass('active');
    $(this).addClass('active');

    var selector = $(this).attr('data-filter');
    $('.portfolio-item').isotope({
        filter: selector
    });
    return false;
});
$(document).ready(function () {
    $('.popup-btn').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        },
        image: {
            // options for image content type
            titleSrc: function(item){
                const user = item.el[0].getAttribute('user');
                const name = item.el[0].getAttribute('username');
                return `<p><a class="text-primary" href="/user/${user}">@${name}</a> ${item.el[0].title}</p>`;
            }
        }
    });

    $('#form-img').submit(async function(e)  {
        e.preventDefault();
        const file = $('#img')[0].files[0];
        const rawFormData = $("#form-img").serializeArray();
        const formData = rawFormData.reduce((rs, cur) => {
            rs[cur.name] = cur.value;
            return rs;
        },{});
        let flag = true;
        if(file){
            const validImg = isValidImg(file);
            if(validImg.status){
                const base64Img = await getBase64(file);
                formData['img'] = base64Img;
            }else{
            flag = false;
            $('#error').text(validImg.msg);
            }
        }else{
            flag = false;
            $('#error').text("Chose your picture you want to upload");
        }
        if(!formData.title){
            flag = false;
            $('#error').text('Title cannot blank');
        }
        if(flag) {
            $.ajax({
                url: '/post',
                type: "POST",
                data: JSON.stringify(formData)
            }).done(() => location.reload());
        }
    });

    $('#openModal').click(function(){
        $($(this).attr('data-target')).modal('show');
    });
    $('#editProfile').click(function(){
        $($(this).attr('data-target')).modal('show');
    });
    $('.close-modal').click(function(){
        console.log('close')
        $($(this).attr('data-dismiss')).modal('hide');
    });

    $('#img').change(async function(){
        const img_src = await getBase64($('#img')[0].files[0]);
        $('#preview').attr('src', img_src);
    });

    $('.del-picture').click(function(){
        if(confirm('Are you sure to delete this picture')){
            $.ajax({
                url: '/post/' + $(this).attr('data-id'),
                type: 'DELETE',
            }).done(() => location.reload());
        }
    });

    $('#editProfileForm').submit(async function(e){
        e.preventDefault();
        const file = $('#avt')[0].files[0];
        const rawFormData = $("#editProfileForm").serializeArray();
        const formData = rawFormData.reduce((rs, cur) => {
            rs[cur.name] = cur.value;
            return rs;
        },{});
        let flag = true;
        if(file){
            const validImg = isValidImg(file);
            if(validImg.status){
                const base64Img = await getBase64(file);
                formData['img'] = base64Img;
            }else{
            flag = false;
            $('#error-profile').text(validImg.msg);
            }
            console.log(validImg);
        }        
        if(!formData.name){
            flag = false;
            $('#error-profile').text('Name cannot blank');
        }
        if(flag) {
            $.ajax({
                url: '/profile',
                type: "PUT",
                data: JSON.stringify(formData)
            }).done(() => location.reload());
        }
    });
});

