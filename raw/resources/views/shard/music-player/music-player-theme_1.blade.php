<?php
$musics = [
    ['name' => 'Instrument 1', 'source' => '/assets/audio/mp3/song1.mp3'],
    ['name' => 'Instrument 2', 'source' => '/assets/audio/mp3/song1.mp3'],
    ['name' => 'Instrument 3', 'source' => '/assets/audio/mp3/song1.mp3'],
]
?>
<div id="cover">
    <div class="panel panel-default">
        <audio id="audio" tabindex="0" controls>
            <source src="{{$musics[0]['source']}}">
        </audio>
    </div>

    <ul id="playlist">
        @foreach($musics as $k => $music)
            <li class="{{$k === 0 ? 'active' : ''}} list-group-item">
                <a href="{{$music['source']}}">
                    {{$music['name']}}
                </a>
            </li>
        @endforeach
    </ul>
</div>
