@extends('layouts.app')

@section('content')
<style>
html, body {
    height: 100%;
    margin: 0;
}

.coming-soon-section {
    height: 100%;
}
</style>
<!-- Coming Soon Section -->
<section class="coming-soon-section d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h2>Coming Soon</h2>
                <p>We're working hard to bring you something awesome. Stay tuned!</p>
                <div id="countdown" class="countdown"></div>
            </div>
        </div>
    </div>
</section>



<!-- JavaScript for Countdown Timer -->
<script>
    // Set the date we're counting down to
    var countDownDate = new Date("Jan 1, 2025 00:00:00").getTime();

    // Update the countdown every 1 second
    var x = setInterval(function() {

        // Get the current date and time
        var now = new Date().getTime();

        // Calculate the time remaining
        var distance = countDownDate - now;

        // Calculate days, hours, minutes, and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the countdown
        document.getElementById("countdown").innerHTML = days + "d " + hours + "h "
        + minutes + "m " + seconds + "s ";

        // If the countdown is over, display a message
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("countdown").innerHTML = "EXPIRED";
        }
    }, 1000);
</script>


@endsection