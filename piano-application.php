<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piano Application</title>
    <style>
        *{
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        body{
            background: linear-gradient(to bottom, #4f008a,#b149bb);
            min-height: 100vh;
        }

        h1{
            text-align: center;
            margin-top: 50px;
            padding-top: 50px;
            color: aliceblue;
            text-transform: uppercase;
            font-family: sans-serif;
        }

        .wrapper{
            margin-top: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .piano{
            display: flex;
        }

        .key{
            height: calc(var(--width) * 4);
            width: var(--width);
            transition: background-color 0.2s ease;
            position: relative; 
        }

        .white{
            --width:100px;
            background: linear-gradient(to bottom, #ffffff,#f3f3f3);
            border: 1px solid #333;
            border-radius: 0px 0px 10px 10px;
            color: #333;
        }

        .white:active{
            background-color: #CCC;
        }

        .black{
            --width:60px;
            background: linear-gradient(to bottom, #000000,#333333);
            margin-left: calc(var(--width) /-2);
            margin-right: calc(var(--width) /-2);
            z-index: 2;
            border-radius: 0px 0px 8px 8px;
            color: #fff;
        }

        .note-label{
            font-size: 12px;
            color: inherit;
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }

        .black:active{
            background-color: #333;
        }

        .key.active{
            transform: translateY(4px);
        }

    </style>
</head>
<body>

    <h1>Virtual Piano 🎹</h1>
    <div class="wrapper">
        <div class="piano">

            <div data-note="C" class="key white">
                <span class="note-label">C</span>
                <audio src="notes/C.mp3" id="C"></audio>
            </div>

            <div data-note="Db" class="key black">
                <span class="note-label">Db</span>
                <audio src="notes/Db.mp3" id="Db"></audio>
            </div>

            <div data-note="D" class="key white">
                <span class="note-label">D</span>
                <audio src="notes/D.mp3" id="D"></audio>
            </div>

            <div data-note="Eb" class="key black">
                <span class="note-label">Eb</span>
                <audio id="Eb" src="notes/Eb.mp3"></audio>
              </div>
        
              <div data-note="E" class="key white">
                <span class="note-label">E</span>
                <audio id="E" src="notes/E.mp3"></audio>
              </div>
        
              <div data-note="F" class="key white">
                <span class="note-label">F</span>
                <audio id="F" src="notes/F.mp3"></audio>
              </div>
        
              <div data-note="Gb" class="key black">
                <span class="note-label">Gb</span>
                <audio id="Gb" src="notes/Gb.mp3"></audio>
              </div>
        
              <div data-note="G" class="key white">
                <span class="note-label">G</span>
                <audio id="G" src="notes/G.mp3"></audio>
              </div>
        
              <div data-note="Ab" class="key black">
                <span class="note-label">Ab</span>
                <audio id="Ab" src="notes/Ab.mp3"></audio>
              </div>
        
              <div data-note="A" class="key white">
                <span class="note-label">A</span>
                <audio id="A" src="notes/A.mp3"></audio>
              </div>
        
              <div data-note="Bb" class="key black">
                <span class="note-label">Bb</span>
                <audio id="Bb" src="notes/Bb.mp3"></audio>
              </div>
        
              <div data-note="B" class="key white">
                <span class="note-label">B</span>
                <audio id="B" src="notes/B.mp3"></audio>
              </div>

        </div>
    </div>

    <script>
        const keys = document.querySelectorAll(".key");
        const keyMap = {
            'A': 'A', 'B': 'B', 'C': 'C', 'D': 'D', 'E': 'E', 'F': 'F', 'G': 'G'
        };
        
        function playKey(note) {
            const key = document.querySelector(`[data-note="${note}"]`);
            const audio = document.getElementById(note);
            if (audio) {
                audio.currentTime = 0;
                audio.play();
                key.classList.add("active");
                audio.addEventListener("ended", () => key.classList.remove("active"));
            }
        }
        
        keys.forEach(key => key.addEventListener("click", function() {
            playKey(this.dataset.note);
        }));
        
        document.addEventListener("keydown", function(event) {
            const note = keyMap[event.key.toUpperCase()];
            if (note) playKey(note);
        });
    </script>
</body>
</html>