@if (count($errors) > 0)
<div class="error">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
{{-- {{dd()}} --}}
@endif
@extends('layouts.admin')

@section('inpage-css')
  @parent
  <link href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css" rel="stylesheet">
@endsection

@php $title = ucfirst($type) @endphp

@section('content-wrapper')
    <form class="row dropzone border-0 p-0 bg-transparent" method="POST">
        {{ csrf_field() }}
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header ">
                    <h5 class="card-title">Add Product {{ $title }}</h5>
                    <p class="card-category">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reprehenderit commodi veritatis eaque eum inventore saepe accusamus voluptas unde dignissimos beatae esse, placeat facere natus! Quisquam reprehenderit laboriosam recusandae explicabo alias.</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">{{ ucfirst($type)}} Images</label>
                                <div class="dropzone form-control d-flex align-items-center" id="dropzone_uploader">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{ $title }} Name</label>
                                <input type="text" class="form-control" placeholder="Enter product name" name="{{ $type }}_name" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{ $type == 'category' ? 'Select A Caption' : 'Select Category'}}</label>
                                <select name="{{ 'category_'.($type == 'category' ? 'captions' : 'id') }}" class="form-control" placeholder="Placeholder text" required multiselect>
                                    <option value=1>New</option>
                                    <option value=2>Hot</option>
                                    <option value=2>Trending</option>
                                    <option value="python">Sale</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{ $title }} Offer</label>
                                <div class="form-control p-0 btn-group d-flex" style="display: block; width: 100%;">
                                    <a class="form-control btn btn-sm m-0" data-toggle="p_offer" data-title="Y">Create Offer</a>
                                    <a class="form-control btn btn-sm active m-0" data-toggle="p_offer" data-title="N">Cancel Offer</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 d-none">
                            <div class="row p_offer">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Offer Type</label>
                                        <select name="o_type" class="form-control" placeholder="Offer Type">
                                            <option value="" disabled selected> Select Offer type </option> 
                                            <option value="php">PHP</option>
                                            <option value="javascript">Javascript</option>
                                            <option value="python">Python</option>
                                            <option value="java">Java</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Offer Price</label>
                                        <input type="text" class="form-control" placeholder="Enter product quantity">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Offer Duration</label>
                                        <input type="text" class="form-control" placeholder="Enter product quantity">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">{{ $title }} Description</label>
                                <textarea name="{{ $type }}_desc" id="" placeholder="Enter small description here" cols="30" rows="10" class="form-control" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-12" style="text-align: right">
                            <a href="{{ url()->previous() }}" class="btn btn-danger btn-round mr-2">Cancel</a>
                            <button type="submit" class="btn btn-primary btn-round">Add {{ $title }}</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
@endsection

@section('inpage-js')
<script src="{{ asset('vendor/bootstrap/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{ asset('vendor/opensource/dropzone.js')}}"></script>
<script src="{{ asset('vendor/opensource/multiple-select.js')}}"></script>
@parent
<script>
    Dropzone.autoDiscover = false;
    $(() => {
        // jQuery
        var dropzoneUploader = $("#dropzone_uploader").dropzone({
            url: "{{ url()->current() }}",
            autoProcessQueue: false,
            dictDuplicateFile: "Duplicate Files Cannot Be Uploaded",
            preventDuplicates: true,
            paramName: "{{ $type }}_img",
            // maxFiles: 1,
            uploadMultiple: true,
            // The setting up of the dropzone
            init: function() {
                var myDropzone = this;

                $("form").submit(function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    // alert("Hello")
                    myDropzone.processQueue();
                });

                this.on('sendingmultiple', function (data, xhr, formData) {
                    var formValues = $('form').serializeObject()
                    $.each(formValues, function(key, value){
                        formData.append(key,value);
                    });
                    console.log(formData)
                    // return
                });
                this.on("successmultiple", function(files, response) {
                    // Gets triggered when the files have successfully been sent.
                    // Redirect user or notify of success.
                    $('input, select, form, button').each( function() {
                        $(this).prop('disabled', true)
                    })
                    $.notify({
                        icon: 'nc-icon nc-check-2',
                        title: '<h6 class="m-0 mb-2">Hurray!</h6>',
                        message: '<p class="m-0" style="line-height: 1.5;">You have just added a new category, let move on.',
                    }, {
                        allow_disable: false,
                        delay: 0,
                        type: 'success',
                        onClose: function() {
                            window.location.href = "{{ route('product.'.$type) }}";
                        }
                    });
                });
                
                this.on("errormultiple", function(files, response) {
                    console.log(response)
                    $('button').each( function() {
                        $(this).prop('disabled', true)
                    })
                    var errMsg = [];
                    if(response.message.toLowerCase().includes('duplicate entry')) {
                        errMsg = "{{ $title }} already exist, please create new one or edit the formal one."
                    } else if(typeof response.erros !== 'null') {
                        console.log(response.errors)
                        for (const error in response.errors) {
                            if (response.errors.hasOwnProperty(error)) {
                                const element = response.errors[error];
                                element.forEach(msg => {
                                    errMsg.push(msg)
                                });
                            }
                        }

                        errMsg = errMsg.join(', ');
                    }
                    $.notify({
                        icon: 'nc-icon nc-bulb-63',
                        title: '<h6 class="m-0 mb-2">Oops!</h6>',
                        message: '<p class="m-0" style="line-height: 1.5;">Some entrys are in incorrect <br> ' + errMsg + '</p>',
                    }, {
                        allow_disable: false,
                        delay: 0,
                        type: 'danger',
                        onClose: function() {
                            $(".dz-preview").fadeOut('slow', function() {
                                dropzoneUploader[0].dropzone.removeAllFiles();
                            })
                            
                            $('button').each( function() {
                                $(this).prop('disabled', false)
                            })
                        }
                    });
                });

            }
        });

        const multiselect = document.querySelectorAll('form select[multiselect]');

        multiselect.forEach( function(elem) {
            new MultipleSelect('[name=' + $(elem).attr('name') + ']', {
                placeholder: $(elem).attr('placeholder')
            })
        })

        $('.btn-group .btn').click( function() {
            $('[data-toggle=' + $(this).data('toggle') + ']').removeClass('active')
            $(this).addClass('active')
            if($(this).data('title') == 'N') {
            $('.' + $(this).data('toggle')).parent().addClass('d-none');
            disable = true;
            } else {
            disable = false;
            $('.' + $(this).data('toggle')).parent().removeClass('d-none');
            }
            $('.' + $(this).data('toggle') + ' input, .' + $(this).data('toggle') + ' select').each( function() {
            $(this).prop('disabled', disable)
            })
        })
    });
</script>
@endsection