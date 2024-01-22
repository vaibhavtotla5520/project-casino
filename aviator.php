<?php include 'includes/header.php'; ?>
<style>
    body {
        margin: 0;
        overflow: auto;
    }

    .sky-blue-container {
        position: relative;
        background-color: #87CEEB;
        width: 100%;
        height: 56.25vw; /* You may need to adjust this value based on your design */
        max-height: 100vh;
        margin-bottom: 30px;
        overflow: hidden;
        z-index: -1;
    }

    .airplane {
        position: absolute;
        bottom: 0%;
        left: 0%;
        height: 8vw;
        width: 8vw;
        z-index: -1;
        animation: moveAirplane 7s linear infinite;
    }

    .graph {
        position: absolute;
        bottom: 0%;
        z-index: -1;
    }

    .down {
        background-color: #ff0000;
        height: 5px;
        width: 100%;
        position: absolute;
        bottom: 0%;
        left: 0%;
    }

    .mainExp {
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 10rem;
    z-index: 1;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}


    @keyframes moveAirplane {
        0% {
            transform: translateX(1vw);
        }

        20% {
            transform: translateX(10vw);
        }

        30% {
            transform: translateX(20vw) translateY(-2vw) rotate(-5deg);
        }

        35% {
            transform: translateX(25vw) translateY(-4vw) rotate(-15deg);
        }

        80% {
            transform: translateX(70vw) translateY(-37vw);
        }

        90% {
            transform: translateX(75vw) translateY(-30vw);
        }

        100% {
            transform: translateX(80vw) translateY(-37vw);
            right: 40px;
        }
    }

    @keyframes moveAnimationNew {
        0% {
            transform: translateX(80vw) translateY(-37vw);
            /* Start from the previous endpoint */

        }

        100% {
            transform: translateX(80vw) translateY(-20vw);
            /* Continue with the new animation */

        }
    }

    @keyframes moveAnimationEnd {
        0% {
            transform: translateX(80vw) translateY(-37vw);
            /* Start from the previous endpoint */

        }

        100% {
            transform: translateX(100vw) translateY(-40vw);
            /* Continue with the new animation */

        }
    }

    @media screen and (max-width:480px) {
        .airplane {
            width: 15vw;
            height: 15vw;
        }

        .mainExp {
            font-size: 6rem;
        }
    }

    @media screen and (max-width: 480px) {
        .airplane {
            width: 15vw;
            height: 15vw;
        }

        .mainExp {
            font-size: 3rem; /* Adjust the font size for smaller screens */
        }
    }
</style>








<div class="container" style="height: 130px;"></div>
<div class="container-fluid sky-blue-container">

    <img src="./assets/images/aviator/rocket.gif" class="airplane" id="animatedElement" />
    <div class="graph" id="graph"></div>
    <div class="mainExp"><span id="exponent">0.0</span>x</div>
    <div class="down"></div>
</div>

<script>
    var timer;
    const exponent = document.getElementById('exponent');

    function forexp() {
        var sec = 0.0;
        timer = setInterval(() => {
            exponent.innerHTML = sec.toFixed(1);
            sec = sec + 0.1;
        }, 100)
    }

    forexp();
    const element = document.getElementById('animatedElement');
    const graph = document.getElementById('graph');

    function updateSize() {
        // Get the computed style of the airplane to extract transform values
        const computedStyle = window.getComputedStyle(element);
        const transformValue = computedStyle.getPropertyValue('transform');
        // Update the height and width of the graph div based on the translateY value
        const translateYValue = parseInt(transformValue.split(',')[5].trim());
        const translateXValue = parseInt(transformValue.split(',')[4].trim());
        graph.style.borderTop = `${Math.abs(translateYValue/2)}px solid transparent`;
        graph.style.borderLeft = `${Math.abs(translateXValue/2)}px solid transparent`;
        graph.style.borderBottom = `${Math.abs(translateYValue/2)}px solid rgba(255,0,0,0.6)`;
        graph.style.borderRight = `${Math.abs(translateXValue/2)}px solid rgba(255,0,0,0.6)`;

        // Request the next animation frame
        requestAnimationFrame(updateSize);
    }
    element.addEventListener('animationstart', () => {
        // Start updating the size
        updateSize();
        // Perform actions or start a new animation from this point
        // For example, start a new animation
        // Apply a paused class to stop the animation
    });
    element.addEventListener('animationiteration', () => {

        element.style.animation = 'moveAnimationNew 1s linear 4 alternate';
        // Start updating the size
        updateSize();

        // Perform actions or start a new animation from this point
        // For example, start a new animation
        // Apply a paused class to stop the animation

    });
    element.addEventListener('animationend', () => {
        graph.style.border = '0px'
        element.style.animation = 'moveAnimationEnd 0.2s linear 1';
    })

    element.addEventListener('animationend', () => {
    graph.style.border = '0px';
    element.style.animation = 'moveAnimationEnd 0.2s linear 1';

    // Change text color to red for 1 second
    exponent.style.color = 'red';
    document.querySelector('.mainExp').style.color = 'red';

    // Reset colors after 1 second
    setTimeout(() => {
        exponent.style.color = '';
        document.querySelector('.mainExp').style.color = '';
    }, 1000);
});
</script>
<?php include 'includes/footer.php'; ?>