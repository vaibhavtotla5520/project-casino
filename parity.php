<?php include 'includes/header.php'; ?>


<style>
.custom-container {
  width: 90%;
  max-width: 90%;
  margin: 5% 5% 5% 5% ;
  background-color: white;
  border-radius: 15px;
  /* padding: 20px; */
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}


    .circle {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        display: inline-block;
        margin-right: 5px;
    }

    .green {
        background-color: #28a745;
    }

    .violet {
        background-color: #8A2BE2;
    }

    .red {
        background-color: #dc3545;
    }
</style>

<style>
.diagonal-btn {
  position: relative;
  overflow: hidden;
  padding: 8px 16px; 
  height: 47.6px;   
  width: 40.6px;    
  border: none;
  color: white;
  cursor: pointer;
  transition: background 0.3s ease, color 0.3s ease; /* Added color transition */
}
    .violet-green-btn {
      background: linear-gradient(135deg, #8A2BE2 50%, #28a745 50%);
    }

    .violet-red-btn {
      background: linear-gradient(135deg, #8A2BE2 50%, #dc3545 50%);
    }

    /* Override Bootstrap default focus styles */
    .diagonal-btn:focus {
      outline: none;
      box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25); /* Example: Add a blue shadow on focus */
    }
  </style>

  


<section>
    <div class="container" style="height: 100px;"></div>

    <div class="container mt-5 text-center">
        <div class="row">
            <div class="col">
                <h2>Period</h2>
                <p>87518643287</p>
            </div>
            <div class="col">
                <h2>Count Down</h2>
                <p id="countdown"></p>
            </div>
        </div>
    </div>
    <div class="container mt-5 text-center">
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-success btn-lg">Join Green</button>
            </div>
            <div class="col">
                <button type="button" class="btn btn-secondary btn-lg" style="background-color: #8A2BE2">Join Violet</button>
            </div>
            <div class="col">
                <button type="button" class="btn btn-danger btn-lg">Join Red</button>
            </div>
        </div>
    </div>
    <div class="container mt-5 text-center">
        <div class="row">
            <div class="col-2 mx-auto">
                <button type="button" class="diagonal-btn violet-red-btn btn-lg">0</button>
            </div>
            <div class="col-2 mx-auto">
                <button type="button" class="btn btn-success btn-lg">1</button>
            </div>
            <div class="col-2 mx-auto">
                <button type="button" class="btn btn-danger btn-lg">2</button>
            </div>
            <div class="col-2 mx-auto">
                <button type="button" class="btn btn-success btn-lg">3</button>
            </div>
            <div class="col-2 mx-auto">
                <button type="button" class="btn btn-danger btn-lg">4</button>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-2 mx-auto">
                <button type="button" class="diagonal-btn violet-green-btn btn-lg">5</button>
            </div>
            <div class="col-2 mx-auto">
                <button type="button" class="btn btn-danger btn-lg">6</button>
            </div>
            <div class="col-2 mx-auto">
                <button type="button" class="btn btn-success btn-lg">7</button>
            </div>
            <div class="col-2 mx-auto">
                <button type="button" class="btn btn-danger btn-lg">8</button>
            </div>
            <div class="col-2 mx-auto">
                <button type="button" class="btn btn-success btn-lg">9</button>
            </div>
        </div>
    </div>

    <div class="container custom-container text-center">
        <h2 style="color: black;">Parity Records</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Period</th>
                    <th scope="col">Price</th>
                    <th scope="col">Number</th>
                    <th scope="col">Result</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>50</td>
                    <td>7</td>
                    <td>
                        <div class="circle green"></div>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>45</td>
                    <td>3</td>
                    <td>
                        <div class="circle violet"></div>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>45</td>
                    <td>3</td>
                    <td>
                        <div class="circle red"></div>
                    </td>
                </tr>
                <!-- Add more rows with random values as needed -->
            </tbody>
        </table>
    </div>

    <div class="container" style="height: 100px;"></div>

</section>



<script>
    // Countdown function
    function startCountdown(duration, display) {
        let timer = duration,
            minutes, seconds;
        setInterval(function() {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            if (--timer < 0) {
                timer = duration;
            }
        }, 1000);
    }

    // Set the countdown duration (30 seconds)
    const countdownDuration = 30;

    // Get the countdown element
    const countdownElement = document.getElementById("countdown");

    // Start the countdown
    startCountdown(countdownDuration, countdownElement);
</script>

<?php include 'includes/footer.php'; ?>