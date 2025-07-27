<!DOCTYPE html>
<html lang="en">
<head>
	@include('home.css')
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    
    @include('home.header')

    @include('home.about')

    @include('home.gallary')

    @include('home.booktable')
    
    @include('home.blog')

    @include('home.contact')
   

   @include('home.footer')

    <!--  Back to top button  -->
    <a id="back-to-top " data-toggle="tooltip " title="Back to Top" href="#">
        <i class="ti-arrow-up"></i>
    </a>

    @include('home.js')

</body>
</html>
