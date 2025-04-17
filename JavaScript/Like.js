function likePost(buttonElement) {
    const postDiv = buttonElement.closest('.post');
    const postId = postDiv.getAttribute('data-post-id');
    const likeCountElement = postDiv.querySelector('.likeCount');

    fetch("../Database/like.php", {
        method: "POST", 
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "post_id=" + encodeURIComponent(postId)
    })
    .then(res => res.text())
    .then(data => {
        console.log("رد الخادم:", data);
        likeCountElement.innerText = data + " لايكات";
    })
    .catch(error => {
        console.error("خطأ في الطلب:", error);
    });
}
