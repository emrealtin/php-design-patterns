<?php
class YouTubeDownloader
{
    protected $youtube;
    protected $ffmpeg;
    public function __construct(string $apiKey)
    {
        $this->youtube = new YouTube($apiKey);
        $this->ffmpeg = new FFMpeg();
    }

    public function downloadVideo(string $url): void
    {
        echo "Fetching video from youtube...\n";
        $video = $this->youtube->fetchVideo($url);

        echo "Saving video file to a temporary file...\n";
        $this->youtube->saveAs($video, "video.mpg");

        echo "Processing source video...\n";
        $video = $this->ffmpeg->open('video.mpg');

        echo "Converting video mp4...\n";
        $video = $this->ffmpeg->convert($video);

        echo "Normalizing and resizing the video to smaller dimensions...\n";
        $video = $this->ffmpeg->resize($video);
        $this->ffmpeg->save($video);

        echo "Saving video in target formats...\n";
        echo "Done!\n";
    }
}

class YouTube
{
    public function fetchVideo($url): string { return 'video'; }
    public function saveAs(string $path): void { /* ... */ }
}

class FFMpeg
{
    public static function create(): FFMpeg { /* ... */ }
    public function open(string $video): string { return 'video'; }

    public function resize($video): string { return 'video'; }

    public function convert($video): string { return 'video'; }

    public function save($path) { /* ... */ }
}

$facade = new YouTubeDownloader("APIKEY-XXXXXXXXX");
$facade->downloadVideo('http://test.url');