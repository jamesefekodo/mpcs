@extends('layouts.userLayout')

@section('title', 'Create New Policy')

@section('content')
    <div class="page-head">
        <div>
            <h1 class="page-title">Create New Policy</h1>
            <p class="page-sub">
                Add a policy, rule, or compliance statement for the cooperative society.
            </p>
        </div>

        <div class="head-actions">
            <a href="{{ route('systemPolicies') }}" class="btn btn-secondary">
                <i class="fa-solid fa-arrow-left"></i>
                Back to Policies
            </a>
        </div>
    </div>

    <form action="{{ route('admin.systemPolicies.store') }}" method="POST" class="my-form">
        @csrf

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <div class="alert-icon">
                    <i class="fa-solid fa-circle-exclamation"></i>
                </div>

                <div>
                    <strong>Please correct the following issues:</strong>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <div class="form-grid">
            <div class="card form-card">
                {{-- <div class="card-head">
                    <div>
                        <h2 class="card-title">Create Policy</h2>
                        <p class="card-sub">
                            Add a policy, rule, or compliance statement for the cooperative society.
                        </p>
                    </div>
                </div> --}}

                <div class="card-body">
                    {{-- Policy Details --}}
                    <div class="form-section">
                        <h3 class="section-title">Policy Details</h3>

                        <div class="form-field">
                            <label for="title">
                                Policy Title
                                <span class="required">*</span>
                            </label>

                            <input id="title" name="title" type="text" placeholder="e.g. Loan Eligibility Policy"
                                value="{{ old('title') }}" required aria-required="true">
                        </div>
                        <p class="text-danger">{{ $errors->first('title') }}</p>


                        <div class="form-field">
                            <label for="policy_statement">
                                Policy Statement:
                                <span class="required">*</span>
                            </label>

                            <textarea id="policy_statement" name="policy_statement" required>{{ old('policy_statement') }}</textarea>

                            @error('policy_statement')
                                <p class="field-error">
                                    <i class="fa-solid fa-circle-exclamation"></i>
                                    {{ $errors->first('policy_statement') }}
                                </p>
                            @enderror
                        </div>
                        <p class="text-danger">{{ $errors->first('policy_statement') }}</p>
                    </div>

                    {{-- Applicability --}}
                    <div class="form-section">
                        <h3 class="section-title">Applicability</h3>
                        <div class="row col-md-12">
                            <div class="col-md-6">
                                <label class="checkbox-card" for="applicable_to_member">
                                    <input type="hidden" name="applicable_to_member" value="0">

                                    <input id="applicable_to_member" name="applicable_to_member" type="checkbox"
                                        value="1" @checked(old('applicable_to_member', false))>

                                    <span class="checkbox-content">
                                        <span class="checkbox-title">
                                            <i class="fa-solid fa-users"></i>
                                            Members
                                        </span>

                                        <span class="checkbox-description">
                                            This policy applies to cooperative members.
                                        </span>
                                    </span>
                                </label>
                                 <p class="text-danger">{{ $errors->first('applicable_to_member') }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="checkbox-card" for="applicable_to_administrator">
                                    <input type="hidden" name="applicable_to_administrator" value="0">

                                    <input id="applicable_to_administrator" name="applicable_to_administrator"
                                        type="checkbox" value="1" @checked(old('applicable_to_administrator', false))>

                                    <span class="checkbox-content">
                                        <span class="checkbox-title">
                                            <i class="fa-solid fa-user-gear"></i>
                                            Administrators
                                        </span>

                                        <span class="checkbox-description">
                                            This policy applies to administrators and staff.
                                        </span>
                                    </span>
                                </label>
                                <p class="text-danger">{{ $errors->first('applicable_to_administrator') }}</p>
                            </div>
                        </div>



                    </div>

                    {{-- Publication --}}
                    <div class="form-section">
                        <h3 class="section-title">Publication</h3>

                        <div class="form-field">
                            <label class="switch-field" for="is_active">
                                <span>
                                    <span class="switch-title">
                                        Active Policy
                                    </span>

                                    <span class="switch-description">
                                        Active policies are available to the selected audience.
                                    </span>
                                </span>

                                <input type="hidden" name="is_active" value="0">

                                <input id="is_active" name="is_active" type="checkbox" value="1"
                                    @checked(old('is_active', true))>

                                <span class="switch"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary-b btn-block js-submit-button">
                <span class="js-button-content">
                    <i class="fa-solid fa-floppy-disk"></i>
                    Save Policy
                </span>

                <span class="js-button-loading d-none">
                    <i class="fa-solid fa-circle-notch fa-spin"></i>
                    Saving Policy...
                </span>
            </button>
        </div>

    </form>

    <!-- Initialize Summernote -->
    <script>
        $(document).ready(function() {
            $('#policy_statement').summernote({
                height: 200,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['insert', []],
                    ['view', []]
                ]
            });
        });
    </script>

@endsection
