<script src="{{url('assets/home/js/jquery.js')}}"></script>
<script src="{{url('assets/home/js/moment.js')}}"></script>
<script src="{{url('assets/home/js/bootstrap.js')}}"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYeBBmgAkyAN_QKjAVOiP_kWZ_eQdadeI&callback=initMap&libraries=places"></script>
<script src="{{url('assets/home/js/owl-carousel.js')}}"></script>
<script src="{{url('assets/home/js/blur-area.js')}}"></script>

<script src="{{url('assets/home/icheck/icheck.js')}}"></script>

<script src="{{url('assets/home/js/gmap.js')}}"></script>
<script src="{{url('assets/home/js/magnific-popup.js')}}"></script>
<script src="{{url('assets/home/js/ion-range-slider.js')}}"></script>
<script src="{{url('assets/home/js/sticky-kit.js')}}"></script>
<script src="{{url('assets/home/js/smooth-scroll.js')}}"></script>
<script src="{{url('assets/home/js/fotorama.js')}}"></script>
<script src="{{url('assets/home/js/bs-datepicker.js')}}"></script>
<script src="{{url('assets/home/js/typeahead.js')}}"></script>
<script src="{{url('assets/home/js/quantity-selector.js')}}"></script>
<script src="{{url('assets/home/js/countdown.js')}}"></script>
<script src="{{url('assets/home/js/window-scroll-action.js')}}"></script>
<script src="{{url('assets/home/js/fitvid.js')}}"></script>
<script src="{{url('assets/home/js/youtube-bg.js')}}"></script>
<script src="{{url('assets/home/js/custom.js')}}"></script>

<script>
                $(document).ready(function(){
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $(".post_sub").click(function(){
                        $.ajax({
                            /* the route pointing to the post function */
                            url: '{{url('post_subscribe')}}',
                            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                            type: 'POST',
                            /* send the csrf-token and the input to the controller */
                            data: {_token: CSRF_TOKEN, email:$(".email_sub").val()},
                            dataType: 'JSON',
                            /* remind that 'data' is the response of the AjaxController */
                            success: function (data) {
                                $(".writeinfo2").append(data.msg);

                                if(data.status == 'success'){

                                  setTimeout(function() {
                                         $(".writeinfo2").empty()
                                  }, 4000);

                                }

                                setTimeout(function() {
                                     $(".writeinfo2").empty()
                                }, 3000);
                            }
                        });
                    });
               });
            </script>

            <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-148981903-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-148981903-1');
</script>
