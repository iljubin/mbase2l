@extends('platform::dashboard')

@section('title','title')
@section('description', 'description')

@section('navbar')
    <div class="text-center">
        Navbar
    </div>
@stop

@section('content')
<div class="row">
    <div class="col-md">
        <fieldset class="mb-3" data-async="">
            <div class="bg-white rounded shadow-sm p-4 py-4 d-flex flex-column">
                <div class="form-group">
                    <label for="field-animal-id-bf20a4d427aed564a4a9863e77575f5ca2699581" class="form-label">Animal</label>

                    <div data-controller="select">
                        <select {{ $attributes }}>
                            @foreach($options as $key => $option)
                                <option value="{{$key}}"
                                        @isset($value)
                                        @if (is_array($value) && in_array($key, $value, true)) selected
                                        @elseif (isset($value[$key]) && $value[$key] == $option) selected
                                        @elseif ($key === $value) selected
                                        @endif
                                        @endisset
                                >{{$option}}</option>
                            @endforeach
                        </select>
                    </div>

                    <small class="form-text text-muted">Please select the ID of the individual, if the animal is known.</small>
                </div>
                <div class="form-group">
                    <label for="field-species-list-id-34aa6acde024677a9721f4f74874f09ba3cd628f" class="form-label">Species
                                    <sup class="text-danger">*</sup>

                            </label>

                    <div data-controller="select">
                        <select {{ $attributes }}>
                            @foreach($options as $key => $option)
                                <option value="{{$key}}"
                                        @isset($value)
                                        @if (is_array($value) && in_array($key, $value, true)) selected
                                        @elseif (isset($value[$key]) && $value[$key] == $option) selected
                                        @elseif ($key === $value) selected
                                        @endif
                                        @endisset
                                >{{$option}}</option>
                            @endforeach
                        </select>
                    </div>

                    <small class="form-text text-muted">Please select species.</small>
                </div>
                <div class="form-group">
                    <label for="field-number-of-removal-in-the-hunting-administrative-area-49a04c895753cf49af08c539f8ee128ee102c757" class="form-label">Number and the year of removal in hunting administrative area</label>

                    <div data-controller="input" data-input-mask="999999999999-9999">
                        <input class="form-control" name="number_of_removal_in_the_hunting_administrative_area" mask="999999999999-9999" title="Number and the year of removal in hunting administrative area" id="field-number-of-removal-in-the-hunting-administrative-area-49a04c895753cf49af08c539f8ee128ee102c757" inputmode="text">
                    </div>

                    <small class="form-text text-muted">Please insert number and the year of removal in hunting administrative area.</small>
                </div>
                <div class="form-group" data-select2-id="13">
                    <label for="field-animal-removal-list-id-5e2f7a6c965f3e21ff32676de4f4c96e3b607788" class="form-label">Type of removal
                            <sup class="text-danger">*</sup>
                    </label>

                    <div data-controller="select" data-select2-id="12">
                        <select class="form-control select2-hidden-accessible" name="animal_removal_list_id" title="Type of removal" required="required" id="field-animal-removal-list-id-5e2f7a6c965f3e21ff32676de4f4c96e3b607788" data-select2-id="field-animal-removal-list-id-5e2f7a6c965f3e21ff32676de4f4c96e3b607788" tabindex="-1" aria-hidden="true">
                                            <option value="3657" data-select2-id="6">Varstvo zavarovanih vrst in habitatov</option>
                                            <option value="3658" data-select2-id="28">Preprečevanje nastanka resne škode</option>
                                            <option value="3659" data-select2-id="29">Zagotavljanje zdravja in varnosti ljudi</option>
                                    </select>
                    </div>

                        <small class="form-text text-muted">Please select the type of removal.</small>
                </div>
                <div class="form-group">
                    <label for="field-telemetry-uid-f4c34b729ca946b2d4f47c9cbada81712d1ced0e" class="form-label">Ear-tag number or radio-collar (telemetry) identification

                                </label>

                    <div data-controller="input" data-input-mask="">
                        <input class="form-control" name="telemetry_uid" title="Ear-tag number or radio-collar (telemetry) identification" id="field-telemetry-uid-f4c34b729ca946b2d4f47c9cbada81712d1ced0e">
                    </div>

                    <small class="form-text text-muted">Please describe animal-borne markings (ear-tags, collar, microchips, etc.).</small>
                </div>
                <div class="form-group">
                    <label for="field-animal-handling-date-1a5f89efd0b53728d07ea74e6dc399fa3a2b58ef" class="form-label">Date and time

                            </label>

                    <div data-controller="input" data-input-mask="">
                        <input class="form-control" name="animal_handling_date" type="datetime-local" title="Date and time" id="field-animal-handling-date-1a5f89efd0b53728d07ea74e6dc399fa3a2b58ef">
                    </div>

                </div>
                <div class="form-group">
                    <label for="field-place-of-removal-c19c6006da64fd22c48e2f864f20e8cfa4d9cfce" class="form-label">Geographical location/Local name

                            </label>

                    <div data-controller="input" data-input-mask="">
                        <input class="form-control" name="place_of_removal" title="Geographical location/Local name" id="field-place-of-removal-c19c6006da64fd22c48e2f864f20e8cfa4d9cfce">
                    </div>

                        <small class="form-text text-muted">Please insert geographical location/Local name.</small>
                </div>
                <div class="form-group">
                    <label for="field-place-type-list-id-17f273b4858bcd025acfc2f680aece6fe74fd54a" class="form-label">Place of removal type
                                    <sup class="text-danger">*</sup>

                            </label>

                    <div data-controller="select">
                        <select {{ $attributes }}>
                            @foreach($options as $key => $option)
                                <option value="{{$key}}"
                                        @isset($value)
                                        @if (is_array($value) && in_array($key, $value, true)) selected
                                        @elseif (isset($value[$key]) && $value[$key] == $option) selected
                                        @elseif ($key === $value) selected
                                        @endif
                                        @endisset
                                >{{$option}}</option>
                            @endforeach
                        </select>
                    </div>

                        <small class="form-text text-muted">Please select the place of removal type.</small>
                </div>
                <div class="form-group">
                    <label for="field-unknown-hunter-finder-f7380d609cf982ef0eb46ccbcc6b382b89f77786" class="form-label">!group border is missing! Unknown Hunder/Finder

                            </label>

                    <input hidden="" name="unknown_hunter_finder" value="0">
                    <div class="form-check form-switch">
                        <input value="1" type="checkbox" class="form-check-input" novalue="0" yesvalue="1" name="unknown_hunter_finder" title="!group border is missing! Unknown Hunder/Finder" id="field-unknown-hunter-finder-f7380d609cf982ef0eb46ccbcc6b382b89f77786" checked="">
                        <label class="form-check-label" for="field-unknown-hunter-finder-f7380d609cf982ef0eb46ccbcc6b382b89f77786"></label>
                    </div>

                </div>
                <div class="row form-group align-items-baseline">
                    <div class="col-auto pe-md-0">
                        <div class="form-group">
                            <label for="field-hunter-finder-name-3c746438890a14734289a5503322772c691a6331" class="form-label">!! Hide depending on the checkbox! Hunter/Finder name</label>

                            <div data-controller="input" data-input-mask="">
                                <input class="form-control" name="hunter_finder_name" title="!! Hide depending on the checkbox! Hunter/Finder name" id="field-hunter-finder-name-3c746438890a14734289a5503322772c691a6331">
                            </div>

                            <small class="form-text text-muted">Please insert the name of the hunter/finder</small>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-group">
                            <label for="field-hunter-finder-surname-d9f5433320e85760cdafa57930fc34f421095c63" class="form-label">!! Hide depending on the checkbox! Hunter/Finder surname</label>

                            <div data-controller="input" data-input-mask="">
                                <input class="form-control" name="hunter_finder_surname" title="!! Hide depending on the checkbox! Hunter/Finder surname" id="field-hunter-finder-surname-d9f5433320e85760cdafa57930fc34f421095c63">
                            </div>

                            <small class="form-text text-muted">Please insert the surname of the hunter/finder</small>
                        </div>
                    </div>
                </div>
                <div class="row form-group align-items-baseline">
                    <div class="col-auto pe-md-0 ">
                        <div class="form-group">
                            <label for="field-witness-accompanying-person-name-502ae272e398f74e77f83d98cfa3333feec395cd" class="form-label">Witness/Accompanying person name

                                    </label>

                            <div data-controller="input" data-input-mask="">
                                <input class="form-control" name="witness_accompanying_person_name" title="Witness/Accompanying person name" id="field-witness-accompanying-person-name-502ae272e398f74e77f83d98cfa3333feec395cd">
                            </div>

                            <small class="form-text text-muted">Please insert the name of the Witness/Accompanying person</small>
                        </div>


                    </div>
                    <div class="col-auto">
                        <div class="form-group">
                            <label for="field-hunter-finder-surname-660a6dafbd017c976c77c4faf6cf5609aa98a5e7" class="form-label">Witness/Accompanying person surname</label>

                            <div data-controller="input" data-input-mask="">
                                <input class="form-control" name="hunter_finder_surname" title="Witness/Accompanying person surname" id="field-hunter-finder-surname-660a6dafbd017c976c77c4faf6cf5609aa98a5e7">
                            </div>

                            <small class="form-text text-muted">Please insert the surname of the Witness/Accompanying person</small>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="field-sample-taken-affd11c35e6a241662773ae88cc458b968782be6" class="form-label">Genetic samples collected?</label>

                    <input hidden="" name="sample_taken" value="0">
                    <div class="form-check form-switch">
                        <input value="1" type="checkbox" class="form-check-input" novalue="0" yesvalue="1" name="sample_taken" title="Genetic samples collected?" id="field-sample-taken-affd11c35e6a241662773ae88cc458b968782be6"  onclick="switch_display_div();">
                        <label class="form-check-label" for="field-sample-taken-affd11c35e6a241662773ae88cc458b968782be6"></label>
                    </div>

                </div>
                <div id="dynamic_div" style="display:none;">
                <div class='dynamic_content'>
                <div class="form-group">
                    <label for="field-sample-type-1-a295912e45e73752f73ee07648096d2002703802" class="form-label">Sample type (sampled tissue) 1</label>

                    <div data-controller="input" data-input-mask="">
                        <input class="form-control" name="sample_type_1" title="Sample type (sampled tissue) 1" id="field-sample-type-1-a295912e45e73752f73ee07648096d2002703802">
                    </div>

                    <small class="form-text text-muted">Please insert sample type 1</small>
                </div>
                <div class="form-group">

    <div data-controller="upload" data-upload-storage="public" data-upload-name="images" data-upload-id="dropzone-field-images-346fe186e2c814750ab468cf62d110fee8f42d04" data-upload-data="[]" data-upload-groups="photo" data-upload-multiple="1" data-upload-parallel-uploads="10" data-upload-max-file-size="2" data-upload-max-files="9999" data-upload-timeout="0" data-upload-accepted-files="" data-upload-resize-quality="0.8" data-upload-resize-width="" data-upload-is-media-library="" data-upload-close-on-add="" data-upload-resize-height="">
        <div id="dropzone-field-images-346fe186e2c814750ab468cf62d110fee8f42d04" class="dropzone-wrapper dz-clickable">

            <div class="visual-dropzone sortable-dropzone dropzone-previews">
                <div class="dz-message dz-preview dz-processing dz-image-preview">
                    <div class="bg-light d-flex justify-content-center align-items-center border r-2x" style="min-height: 112px;">
                        <div class="pe-1 ps-1 pt-3 pb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="1em" height="1em" viewBox="0 0 32 32" class="h3" role="img" fill="currentColor" id="field-images-346fe186e2c814750ab468cf62d110fee8f42d04" componentname="orchid-icon">
    <path d="M23.845 8.124c-1.395-3.701-4.392-6.045-8.921-6.045-5.762 0-9.793 4.279-10.14 9.86-2.778 0.889-4.784 3.723-4.784 6.933 0 3.93 3.089 7.249 6.744 7.249h2.889c0.552 0 1-0.448 1-1s-0.448-1-1-1h-2.889c-2.572 0-4.776-2.404-4.776-5.249 0-2.514 1.763-4.783 3.974-5.163l0.907-0.156-0.080-0.916-0.008-0.011c0-4.871 3.205-8.545 8.161-8.545 3.972 0 6.204 1.957 7.236 5.295l0.214 0.688 0.721 0.015c3.715 0.078 6.972 3.092 6.972 6.837 0 3.408-2.259 7.206-5.678 7.206h-2.285c-0.552 0-1 0.448-1 1s0.448 1 1 1l2.277-0.003c5-0.132 7.605-4.908 7.605-9.203 0-4.616-3.617-8.305-8.14-8.791zM16.75 16.092c-0.006-0.006-0.008-0.011-0.011-0.016l-0.253-0.264c-0.139-0.146-0.323-0.219-0.508-0.218-0.184-0.002-0.368 0.072-0.509 0.218l-0.253 0.264c-0.005 0.005-0.006 0.011-0.011 0.016l-3.61 3.992c-0.28 0.292-0.28 0.764 0 1.058l0.252 0.171c0.28 0.292 0.732 0.197 1.011-0.095l2.128-2.373v10.076c0 0.552 0.448 1 1 1s1-0.448 1-1v-10.066l2.199 2.426c0.279 0.292 0.732 0.387 1.011 0.095l0.252-0.171c0.279-0.293 0.279-0.765 0-1.058z"></path>
</svg>
                            <small class="text-muted w-b-k d-block">Upload file</small>
                        </div>
                    </div>
                </div>

                            </div>

            <div class="attachment modal fade center-scale" tabindex="-1" role="dialog" aria-hidden="false">
                <div class="modal-dialog modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title text-black fw-light">
                                File Information
                                <small class="text-muted d-block">Information to display</small>
                            </h4>

                            <button type="button" class="btn-close" title="Close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body p-4">
                            <div class="form-group">
                                <label>System name</label>
                                <input type="text" class="form-control" data-upload-target="name" readonly="" maxlength="255">
                            </div>
                            <div class="form-group">
                                <label>Display name</label>
                                <input type="text" class="form-control" data-upload-target="original" maxlength="255" placeholder="Display name">
                            </div>
                            <div class="form-group">
                                <label>Alternative text</label>
                                <input type="text" class="form-control" data-upload-target="alt" maxlength="255" placeholder="Alternative text">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control no-resize" data-upload-target="description" placeholder="Description" maxlength="255" rows="3"></textarea>
                            </div>


                                                                        <div class="form-group">
                                                <a href="#" data-action="click->upload#openLink">
                                                    <small>
                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="1em" height="1em" viewBox="0 0 32 32" class="me-2" role="img" fill="currentColor" componentname="orchid-icon">
                <path d="M9.239 22.889c0.195 0.195 0.451 0.293 0.707 0.293s0.511-0.098 0.707-0.293l12.114-12.209c0.39-0.39 0.39-1.024 0-1.414s-1.023-0.39-1.414 0l-12.114 12.209c-0.391 0.39-0.391 1.023 0 1.414zM14.871 20.76c0.331 1.457-0.026 2.887-1.152 4.014l-4.039 3.914c-0.85 0.849-1.98 1.317-3.182 1.317s-2.332-0.468-3.182-1.317c-1.754-1.755-1.754-4.61-0.010-6.354l3.946-4.070c0.85-0.849 1.98-1.318 3.182-1.318 0.411 0 0.807 0.073 1.193 0.179l1.561-1.561c-0.871-0.407-1.811-0.619-2.754-0.619-1.663 0-3.327 0.635-4.596 1.904l-3.936 4.061c-2.538 2.538-2.538 6.654 0 9.193 1.269 1.27 2.933 1.904 4.596 1.904s3.327-0.634 4.596-1.904l4.030-3.904c1.942-1.942 2.361-4.648 1.333-7.023zM30.098 1.899c-1.27-1.269-2.933-1.904-4.596-1.904-1.664 0-3.328 0.635-4.596 1.904l-4.029 3.905c-2.012 2.013-2.423 5.015-1.244 7.439l1.552-1.552c-0.459-1.534-0.107-3.261 1.096-4.463l4.039-3.914c0.851-0.849 1.98-1.318 3.183-1.318 1.201 0 2.332 0.469 3.181 1.318 1.754 1.755 1.754 4.611 0.010 6.354l-4.039 4.039c-0.849 0.85-1.98 1.317-3.181 1.317-0.306 0-0.576 0.031-0.87-0.029l-1.593 1.594c0.796 0.331 1.613 0.436 2.463 0.436 1.663 0 3.326-0.634 4.596-1.904l4.029-4.029c2.538-2.538 2.538-6.653-0-9.192z"></path>
            </svg>

                                                        Link to file
                                                    </small>
                                                </a>
                                            </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" data-bs-dismiss="modal" class="btn btn-link">
                                                <span>
                                                    Close
                                                </span>
                                        </button>
                                        <button type="button" data-action="click->upload#save" class="btn btn-default">
                                            Apply
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <template id="dropzone-field-images-346fe186e2c814750ab468cf62d110fee8f42d04-remove-button">
                            <a href="javascript:;" class="btn-remove">×</a>
                        </template>

                        <template id="dropzone-field-images-346fe186e2c814750ab468cf62d110fee8f42d04-edit-button">
                            <a href="javascript:;" class="btn-edit">
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="1em" height="1em" viewBox="0 0 32 32" class="mb-1" role="img" fill="currentColor" componentname="orchid-icon">
                <path d="M24.98 30.009h-23v-25h14.050l2.022-1.948-0.052-0.052h-16.020c-1.105 0-2 0.896-2 2v25c0 1.105 0.895 2 2 2h23c1.105 0 2-0.895 2-2v-14.646l-2 1.909v12.736zM30.445 1.295c-0.902-0.865-1.898-1.304-2.961-1.304-1.663 0-2.876 1.074-3.206 1.403-0.468 0.462-13.724 13.699-13.724 13.699-0.104 0.106-0.18 0.235-0.219 0.38-0.359 1.326-2.159 7.218-2.176 7.277-0.093 0.302-0.010 0.631 0.213 0.851 0.159 0.16 0.373 0.245 0.591 0.245 0.086 0 0.172-0.012 0.257-0.039 0.061-0.020 6.141-1.986 7.141-2.285 0.132-0.039 0.252-0.11 0.351-0.207 0.631-0.623 12.816-12.618 13.802-13.637 1.020-1.052 1.526-2.146 1.507-3.253-0.019-1.094-0.55-2.147-1.575-3.129zM29.076 6.285c-0.556 0.574-4.914 4.88-12.952 12.798l-0.615 0.607c-0.921 0.285-3.128 0.994-4.796 1.532 0.537-1.773 1.181-3.916 1.469-4.929 1.717-1.715 13.075-13.055 13.506-13.48 0.084-0.084 0.851-0.821 1.795-0.821 0.536 0 1.053 0.244 1.577 0.748 0.627 0.602 0.95 1.179 0.959 1.72 0.010 0.556-0.308 1.171-0.943 1.827z"></path>
            </svg>
                            </a>
                        </template>


                    </div>
                </div>

                        <small class="form-text text-muted">Please upload sample images</small>
                </div>
                </div></div>
                <div id='dynamic_div_origin_content' style="display:none;">
                <div class='dynamic_content'>
                <div class="form-group">
                    <label for="field-sample-type-1-a295912e45e73752f73ee07648096d2002703802" class="form-label">Sample type (sampled tissue) 1</label>

                    <div data-controller="input" data-input-mask="">
                        <input class="form-control" name="sample_type_1" title="Sample type (sampled tissue) 1" id="field-sample-type-1-a295912e45e73752f73ee07648096d2002703802">
                    </div>

                    <small class="form-text text-muted">Please insert sample type 1</small>
                </div>
                <div class="form-group">

    <div data-controller="upload" data-upload-storage="public" data-upload-name="images" data-upload-id="dropzone-field-images-346fe186e2c814750ab468cf62d110fee8f42d04" data-upload-data="[]" data-upload-groups="photo" data-upload-multiple="1" data-upload-parallel-uploads="10" data-upload-max-file-size="2" data-upload-max-files="9999" data-upload-timeout="0" data-upload-accepted-files="" data-upload-resize-quality="0.8" data-upload-resize-width="" data-upload-is-media-library="" data-upload-close-on-add="" data-upload-resize-height="">
        <div id="dropzone-field-images-346fe186e2c814750ab468cf62d110fee8f42d04" class="dropzone-wrapper dz-clickable">

            <div class="visual-dropzone sortable-dropzone dropzone-previews">
                <div class="dz-message dz-preview dz-processing dz-image-preview">
                    <div class="bg-light d-flex justify-content-center align-items-center border r-2x" style="min-height: 112px;">
                        <div class="pe-1 ps-1 pt-3 pb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="1em" height="1em" viewBox="0 0 32 32" class="h3" role="img" fill="currentColor" id="field-images-346fe186e2c814750ab468cf62d110fee8f42d04" componentname="orchid-icon">
    <path d="M23.845 8.124c-1.395-3.701-4.392-6.045-8.921-6.045-5.762 0-9.793 4.279-10.14 9.86-2.778 0.889-4.784 3.723-4.784 6.933 0 3.93 3.089 7.249 6.744 7.249h2.889c0.552 0 1-0.448 1-1s-0.448-1-1-1h-2.889c-2.572 0-4.776-2.404-4.776-5.249 0-2.514 1.763-4.783 3.974-5.163l0.907-0.156-0.080-0.916-0.008-0.011c0-4.871 3.205-8.545 8.161-8.545 3.972 0 6.204 1.957 7.236 5.295l0.214 0.688 0.721 0.015c3.715 0.078 6.972 3.092 6.972 6.837 0 3.408-2.259 7.206-5.678 7.206h-2.285c-0.552 0-1 0.448-1 1s0.448 1 1 1l2.277-0.003c5-0.132 7.605-4.908 7.605-9.203 0-4.616-3.617-8.305-8.14-8.791zM16.75 16.092c-0.006-0.006-0.008-0.011-0.011-0.016l-0.253-0.264c-0.139-0.146-0.323-0.219-0.508-0.218-0.184-0.002-0.368 0.072-0.509 0.218l-0.253 0.264c-0.005 0.005-0.006 0.011-0.011 0.016l-3.61 3.992c-0.28 0.292-0.28 0.764 0 1.058l0.252 0.171c0.28 0.292 0.732 0.197 1.011-0.095l2.128-2.373v10.076c0 0.552 0.448 1 1 1s1-0.448 1-1v-10.066l2.199 2.426c0.279 0.292 0.732 0.387 1.011 0.095l0.252-0.171c0.279-0.293 0.279-0.765 0-1.058z"></path>
</svg>
                            <small class="text-muted w-b-k d-block">Upload file</small>
                        </div>
                    </div>
                </div>

                            </div>

            <div class="attachment modal fade center-scale" tabindex="-1" role="dialog" aria-hidden="false">
                <div class="modal-dialog modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title text-black fw-light">
                                File Information
                                <small class="text-muted d-block">Information to display</small>
                            </h4>

                            <button type="button" class="btn-close" title="Close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body p-4">
                            <div class="form-group">
                                <label>System name</label>
                                <input type="text" class="form-control" data-upload-target="name" readonly="" maxlength="255">
                            </div>
                            <div class="form-group">
                                <label>Display name</label>
                                <input type="text" class="form-control" data-upload-target="original" maxlength="255" placeholder="Display name">
                            </div>
                            <div class="form-group">
                                <label>Alternative text</label>
                                <input type="text" class="form-control" data-upload-target="alt" maxlength="255" placeholder="Alternative text">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control no-resize" data-upload-target="description" placeholder="Description" maxlength="255" rows="3"></textarea>
                            </div>


                                                                        <div class="form-group">
                                                <a href="#" data-action="click->upload#openLink">
                                                    <small>
                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="1em" height="1em" viewBox="0 0 32 32" class="me-2" role="img" fill="currentColor" componentname="orchid-icon">
                <path d="M9.239 22.889c0.195 0.195 0.451 0.293 0.707 0.293s0.511-0.098 0.707-0.293l12.114-12.209c0.39-0.39 0.39-1.024 0-1.414s-1.023-0.39-1.414 0l-12.114 12.209c-0.391 0.39-0.391 1.023 0 1.414zM14.871 20.76c0.331 1.457-0.026 2.887-1.152 4.014l-4.039 3.914c-0.85 0.849-1.98 1.317-3.182 1.317s-2.332-0.468-3.182-1.317c-1.754-1.755-1.754-4.61-0.010-6.354l3.946-4.070c0.85-0.849 1.98-1.318 3.182-1.318 0.411 0 0.807 0.073 1.193 0.179l1.561-1.561c-0.871-0.407-1.811-0.619-2.754-0.619-1.663 0-3.327 0.635-4.596 1.904l-3.936 4.061c-2.538 2.538-2.538 6.654 0 9.193 1.269 1.27 2.933 1.904 4.596 1.904s3.327-0.634 4.596-1.904l4.030-3.904c1.942-1.942 2.361-4.648 1.333-7.023zM30.098 1.899c-1.27-1.269-2.933-1.904-4.596-1.904-1.664 0-3.328 0.635-4.596 1.904l-4.029 3.905c-2.012 2.013-2.423 5.015-1.244 7.439l1.552-1.552c-0.459-1.534-0.107-3.261 1.096-4.463l4.039-3.914c0.851-0.849 1.98-1.318 3.183-1.318 1.201 0 2.332 0.469 3.181 1.318 1.754 1.755 1.754 4.611 0.010 6.354l-4.039 4.039c-0.849 0.85-1.98 1.317-3.181 1.317-0.306 0-0.576 0.031-0.87-0.029l-1.593 1.594c0.796 0.331 1.613 0.436 2.463 0.436 1.663 0 3.326-0.634 4.596-1.904l4.029-4.029c2.538-2.538 2.538-6.653-0-9.192z"></path>
            </svg>

                                                        Link to file
                                                    </small>
                                                </a>
                                            </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" data-bs-dismiss="modal" class="btn btn-link">
                                                <span>
                                                    Close
                                                </span>
                                        </button>
                                        <button type="button" data-action="click->upload#save" class="btn btn-default">
                                            Apply
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <template id="dropzone-field-images-346fe186e2c814750ab468cf62d110fee8f42d04-remove-button">
                            <a href="javascript:;" class="btn-remove">×</a>
                        </template>

                        <template id="dropzone-field-images-346fe186e2c814750ab468cf62d110fee8f42d04-edit-button">
                            <a href="javascript:;" class="btn-edit">
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="1em" height="1em" viewBox="0 0 32 32" class="mb-1" role="img" fill="currentColor" componentname="orchid-icon">
                <path d="M24.98 30.009h-23v-25h14.050l2.022-1.948-0.052-0.052h-16.020c-1.105 0-2 0.896-2 2v25c0 1.105 0.895 2 2 2h23c1.105 0 2-0.895 2-2v-14.646l-2 1.909v12.736zM30.445 1.295c-0.902-0.865-1.898-1.304-2.961-1.304-1.663 0-2.876 1.074-3.206 1.403-0.468 0.462-13.724 13.699-13.724 13.699-0.104 0.106-0.18 0.235-0.219 0.38-0.359 1.326-2.159 7.218-2.176 7.277-0.093 0.302-0.010 0.631 0.213 0.851 0.159 0.16 0.373 0.245 0.591 0.245 0.086 0 0.172-0.012 0.257-0.039 0.061-0.020 6.141-1.986 7.141-2.285 0.132-0.039 0.252-0.11 0.351-0.207 0.631-0.623 12.816-12.618 13.802-13.637 1.020-1.052 1.526-2.146 1.507-3.253-0.019-1.094-0.55-2.147-1.575-3.129zM29.076 6.285c-0.556 0.574-4.914 4.88-12.952 12.798l-0.615 0.607c-0.921 0.285-3.128 0.994-4.796 1.532 0.537-1.773 1.181-3.916 1.469-4.929 1.717-1.715 13.075-13.055 13.506-13.48 0.084-0.084 0.851-0.821 1.795-0.821 0.536 0 1.053 0.244 1.577 0.748 0.627 0.602 0.95 1.179 0.959 1.72 0.010 0.556-0.308 1.171-0.943 1.827z"></path>
            </svg>
                            </a>
                        </template>


                    </div>
                </div>

                        <small class="form-text text-muted">Please upload sample images</small>
                </div>
                </div>
                </div>
                <div class="row form-group align-items-baseline" id='button_group_div' style="display:none">
                        <div class="col-auto

                                pe-md-0
                        ">
                        <div class="form-group mb-0">


                <button data-controller="button" data-turbo="true" class="btn  btn-primary" type="submit" form="post-form" formaction="http://127.0.0.1:8000/admin/bears-biometry-animal-handlings/create/buttonClickProcessing" onclick="add_dynamic_content();">


                    Add genetic sample
                </button>

                </div>

                    </div>
                        <div class="col-auto


                        ">
                        <div class="form-group mb-0">


                <button data-controller="button" data-turbo="true" class="btn  btn-danger" type="submit" form="post-form" formaction="http://127.0.0.1:8000/admin/bears-biometry-animal-handlings/create/buttonClickProcessing" onclick="remove_dynamic_content();">


                    Remove Last
                </button>

                </div>

                    </div>
                </div>
                <div class="row form-group align-items-baseline">
            <div class="col-auto

                    pe-md-0
            ">
            <div class="form-group">
            <label for="field-hair-sample-taken-dd87d1e5edc7cb846debf4016397594d89a38a61" class="form-label">!group border is missing! Hair sample collected?

                    </label>

    <input hidden="" name="hair_sample_taken" value="0">
        <div class="form-check form-switch">
            <input value="1" type="checkbox" class="form-check-input" novalue="0" yesvalue="1" name="hair_sample_taken" title="!group border is missing! Hair sample collected?" id="field-hair-sample-taken-dd87d1e5edc7cb846debf4016397594d89a38a61" checked="">
            <label class="form-check-label" for="field-hair-sample-taken-dd87d1e5edc7cb846debf4016397594d89a38a61"></label>
        </div>

    </div>


        </div>
            <div class="col-auto

                    pe-md-0
            ">
            <div class="form-group">
            <label for="field-blood-sample-taken-04021e62c56abcd3eeb3862bfdf9df3fdc0efcb9" class="form-label">!group border is missing! Blood sample collected?

                    </label>

    <input hidden="" name="blood_sample_taken" value="0">
        <div class="form-check form-switch">
            <input value="1" type="checkbox" class="form-check-input" novalue="0" yesvalue="1" name="blood_sample_taken" title="!group border is missing! Blood sample collected?" id="field-blood-sample-taken-04021e62c56abcd3eeb3862bfdf9df3fdc0efcb9" checked="">
            <label class="form-check-label" for="field-blood-sample-taken-04021e62c56abcd3eeb3862bfdf9df3fdc0efcb9"></label>
        </div>

    </div>


        </div>
            <div class="col-auto


            ">
            <div class="form-group">
            <label for="field-tooth-type-list-id-9ecdb2859d6b0f71c34e8cb0a32225bb3ec3338e" class="form-label">Tooth Type

                    </label>

    <div data-controller="select">
        <select class="form-control select2-hidden-accessible" name="tooth_type_list_id" title="Tooth Type" id="field-tooth-type-list-id-9ecdb2859d6b0f71c34e8cb0a32225bb3ec3338e" data-select2-id="field-tooth-type-list-id-9ecdb2859d6b0f71c34e8cb0a32225bb3ec3338e" tabindex="-1" aria-hidden="true">
                            <option value="" data-select2-id="10">&lt;Empty&gt;</option>
                            <option value="152">Zgornji P1</option>
                            <option value="153">Zgornji P2</option>
                            <option value="159">Zgornji P3</option>
                            <option value="160">Zgornji P4</option>
                            <option value="161">Spodnji P1</option>
                            <option value="162">Spodnji P2</option>
                            <option value="163">Spodnji P3</option>
                            <option value="164">Spodnji P4</option>
                    </select>
    </div>

            <small class="form-text text-muted">Please select the Tooth Type.</small>
    </div>


        </div>
    </div>
    <div class="row form-group align-items-baseline">
            <div class="col-auto

                    pe-md-0
            ">
            <div class="form-group">
            <label for="field-taxidermist-name-fc4bb916d5fe183f66e18ab54fc70f27d02bace9" class="form-label">Taxidermist name

                    </label>

    <div data-controller="input" data-input-mask="">
        <input class="form-control" name="taxidermist_name" title="Taxidermist name" id="field-taxidermist-name-fc4bb916d5fe183f66e18ab54fc70f27d02bace9">
    </div>

            <small class="form-text text-muted">Please insert the name of the Taxidermist</small>
    </div>


        </div>
            <div class="col-auto


            ">
            <div class="form-group">
            <label for="field-taxidermist-surname-709b9f00ac91bb767f36c316dea591353a2c0380" class="form-label">Taxidermist surname

                    </label>

    <div data-controller="input" data-input-mask="">
        <input class="form-control" name="taxidermist_surname" title="Taxidermist surname" id="field-taxidermist-surname-709b9f00ac91bb767f36c316dea591353a2c0380">
    </div>

            <small class="form-text text-muted">Please insert the surname of the Taxidermist</small>
    </div>


        </div>
    </div>
            </div>
        </fieldset>

    </div>
    <div class="col-md">
        <fieldset class="mb-3" data-async="">
            <div class="bg-white rounded shadow-sm p-4 py-4 d-flex flex-column">
            </div>
        </fieldset>

    </div>
</div>
<script>
    function switch_display_div(){
        if($('#dynamic_div').css('display')=='none'){
            $('#dynamic_div').show();
            $('#button_group_div').show();
        }
        else{
            $('#dynamic_div').hide();
            $('#button_group_div').hide();
        }

    }
    function add_dynamic_content(){
        var element = $('#dynamic_div_origin_content');
        var length = $("#dynamic_div").children().length;
        element.find('.form-label').html("Sample type (sampled tissue) "+(length+1));
        element.find('.text-muted').first().html("Sample type (sampled tissue) "+(length+1));
        console.log(element.find('.form-label'));
        console.log(length);
        $('#dynamic_div').append(element.html());
    }
    function remove_dynamic_content(){
        $("#dynamic_div").children().last().remove();
    }
</script>
@stop
