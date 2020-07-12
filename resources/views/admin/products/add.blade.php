@extends('layouts.admin')

@section('inpage-css')
  @parent
  <link href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css" rel="stylesheet">
@endsection

@section('content-wrapper')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header ">
                    <h5 class="card-title">Add Product</h5>
                    <p class="card-category">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reprehenderit commodi veritatis eaque eum inventore saepe accusamus voluptas unde dignissimos beatae esse, placeat facere natus! Quisquam reprehenderit laboriosam recusandae explicabo alias.</p>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Product Images</label>
                                    <div class="dropzone form-control d-flex align-items-center" id="dropzone_uploader">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input type="text" class="form-control" placeholder="Enter product name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Product Price</label>
                                    <input type="text" class="form-control" placeholder="Enter product price">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Product Qty</label>
                                    <input type="text" class="form-control" placeholder="Enter product quantity">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Product Category</label>
                                    <select name="p_cat" class="form-control">
                                        <option value="" selected disabled> Select a category </option>
                                        @foreach ($categories as $category)
                                        <option value="{{$category -> pc_id }}"> {{$category -> pc_name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Product Subcategory</label>
                                    <select name="p_subcat" class="form-control" placeholder="Select a subcategory" multiple>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Product Offer</label>
                                    <div class="form-control p-0 btn-group d-flex" style="display: block; width: 100%;">
                                        <a class="form-control btn btn-sm m-0" data-toggle="p_offer" data-title="Y">Create Offer</a>
                                        <a class="form-control btn btn-sm active m-0" data-toggle="p_offer" data-title="N">Cancel Offer</a>
                                    </div>
                                    {{-- <select id="select-multiple-language" class="form-control">
                                        <option value="php">PHP</option>
                                        <option value="javascript">Javascript</option>
                                        <option value="python">Python</option>
                                        <option value="java">Java</option>
                                    </select> --}}
                                </div>
                            </div>

                            <div class="col-lg-12 d-none">
                                <div class="row p_offer">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Offer Type</label>
                                            <select name="o_type" class="form-control" placeholder="Offer Type">
                                                <option value="" disabled selected> Select Offer type </option> 
                                                
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
                                    <label>Product Tag</label>
                                    <div class="form-control">
                                        <input type="text" class="tags" placeholder="Enter product name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Product Description</label>
                                    <textarea name="" id="" placeholder="Enter small description here" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-12" style="text-align: right">
                            <button type="submit" class="btn btn-danger btn-round mr-2">Cancel</button>
                          <button type="submit" class="btn btn-primary btn-round">Add Product</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
        $("#dropzone_uploader").dropzone({
            url: "{{ route('product.add') }}",
            autoProcessQueue: false,
            dictDuplicateFile: "Duplicate Files Cannot Be Uploaded",
            preventDuplicates: true,
            maxFiles: 1
        });

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

        Array('[name=p_cat]', '[name=p_subcat]', '[name=o_type').forEach( function(target) {
            new MultipleSelect(target, {
                placeholder: $(target).attr('placeholder')
            })
        })

        @php
        echo 'var categories = '. json_encode($categories) . ';';
        @endphp

        $('[name=p_cat]').on('change', function(e) {
            if(typeof $(this).val() !== "null" && $(this).val()) {
                var mc = categories[$(this).val()].subcategory;
                console.log(mc)
                $('[name=p_subcat]').html('');
                for (const cat in mc) {
                    console.log(cat)
                    if (mc.hasOwnProperty(cat)) {
                        const element = mc[cat];
                        // console.log(element)
                        window.selectMultipleContainerId = 0;
                        $('[name=p_subcat]').append('<option>Hello</option>').next().remove()
                        new MultipleSelect('[name=p_subcat]', {
                            placeholder: $('[name=p_subcat]').attr('placeholder')
                        })
                    }
                }
            }
        })

        $('input.tags').tagsinput({
            tagClass: 'd-flex align-items-center'
        });

        $('.bootstrap-tagsinput input').on({
            focus: function() {
              $(this).parent().parent('.form-control').addClass('focused')
            },
            blur: function() {
              $(this).parent().parent('.form-control').removeClass('focused')
            }
        })
    });
</script>
@endsection