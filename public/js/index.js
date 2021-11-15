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
    return { status: false, msg: "Ảnh phải có định dạng .jpeg .png .gif .jpg" };
  }
  if (img.size > 150000) {
    return { status: false, msg: "Kích thước ảnh < 150KB" };
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
    var popup_btn = $('.popup-btn');
    popup_btn.magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
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
        const base64Img = await getBase64(file);
        formData['img'] = base64Img;
        // console.log(formData);

        $.ajax({
            url: '/post',
            type: "POST",
            data: JSON.stringify(formData)
        }).done((res) => console.log(res));
    })
});

