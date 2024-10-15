const API_KEY = '';
const VID_URL = 'https://www.googleapis.com/youtube/v3/videos';
const SER_URL = 'https://www.googleapis.com/youtube/v3/search';
const trends = document.querySelector(".api");
const GetTrends = async () => {
    try {
        const url = new URL(VID_URL);
        url.searchParams.append("part", "contentDetails,id,snippet,statistics");
        url.searchParams.append("chart", "mostPopular");
        url.searchParams.append("regionCode", "RU");
        url.searchParams.append("maxResults", 110);
        url.searchParams.append("key", API_KEY);
        const response = await fetch(url);
        if (!response.ok) { throw new Error("HTTP Error ", response.status); }
        return await response.json();
    } catch (error) {
        console.error("error: ", error);
    }
}
function timeAgo(date) {
    const seconds = Math.floor((Date.now() - date) / 1000);
    let interval = Math.floor(seconds / 31536000);

    if (interval > 1) {
        return interval + " года назад";
    }
    interval = Math.floor(seconds / 2592000);
    if (interval > 1) {
        return interval + " месяца назад";
    }
    interval = Math.floor(seconds / 604800);
    if (interval > 1) {
        return interval + " недели назад";
    }
    interval = Math.floor(seconds / 86400);
    if (interval > 1) {
        return interval + " дня назад";
    }
    interval = Math.floor(seconds / 3600);
    if (interval > 1) {
        return interval + " часа назад";
    }
    interval = Math.floor(seconds / 60);
    if (interval > 1) {
        return interval + " минуты назад";
    }
    return Math.floor(seconds) + " секунд назад";
}

const displayVideo = (videos) => {
    trends.textContent = "";
    console.log("vids: ",videos);
    const listVideos = videos.items.map(video => {
        const section = document.createElement('section');
        section.classList.add('vidcard');
        let dt= new Date(video.snippet.publishedAt);
        dt=timeAgo(dt);
        section.innerHTML = `
        <a href="video.html?id=${video.id}">
        <img src="${video.snippet.thumbnails.high.url}">
        <span>${video.snippet.title}</span></a><br>
        <span class="info"><a href="/channel/id?">${video.snippet.channelTitle}</a> | ${dt} | Просмотры: ${parseInt(video.statistics.viewCount).toLocaleString()}</span>`;
        return section
    });
    trends.append(...listVideos)
}
GetTrends().then(displayVideo);