const jsonUrl = 'twitter.json';

const section = document.querySelector('section');

fetch(jsonUrl).then(function(result) {
    return result.json();
}).then(function(json) {
    displayResult(json);
});

function displayResult(json) {
    while(section.firstChild) {
        section.removeChild(section.firstChild);
    }

    console.log(json.length);

    if(json.length === 0) {
        const para = document.createElement('p');
        para.textContent = 'Not found your tweet data';
        section.appendChild(para);
    } else {
        for(let i = 0; i < json.length; i++) {
            const article = document.createElement('article');
            const div = document.createElement('div'); 
            const userImage = document.createElement('img');
            const screenName = document.createElement('p');
            const postDate = document.createElement('p');
            const postText = document.createElement('p');

            let post = json[i];
            console.log(post);

            screenName.textContent = post.user.screen_name;
            postText.textContent = post.text;
            userImage.src = post.user.profile_image_url;
            postDate.textContent = post.created_at;
            console.log(postDate.getMonth)


            if(post.retweeted_status) {
                screenName.textContent = post.retweeted_status.user.name;
                postText.textContent = post.retweeted_status.text;
                userImage.src = post.retweeted_status.user.profile_image_url;
                postDate.textContent = post.retweeted_status.created_at;
            }

            section.appendChild(article);
            article.appendChild(userImage);
            article.appendChild(div);
            div.appendChild(screenName);
            div.appendChild(postDate);
            div.appendChild(postText);
        }
        
    }
}



