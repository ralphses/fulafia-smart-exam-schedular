<!-- Callback Start -->
<div class="container-fluid callback my-5 pt-5" id="registerSchool">
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="bg-white border rounded p-4 p-sm-5 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                        <h1 class="display-5 mb-5">View Timetable</h1>
                    </div>
                    <form action="{{ route('timetable.view.public') }}" method="GET">

                        <div class="row g-3">
                            <div class="col-sm-12">
                                <div class="form-floating">
                                    <input type="text" name="matric" class="form-control" id="matric">
                                    <label for="matric">Matric Number</label>
                                </div>
                                @if ($errors->any('matric'))
                                    <p style="color: red; font-size: medium">{{ $errors->first('matric') }}</p>
                                @endif
                            </div>
                            <div class="col-sm-12">
                                <div class="form-floating">
                                    <select class="form-select" id="student-school" name="_school">
                                        <option selected="" value="0">select..</option>
                                        @foreach (\App\Models\TimeTable::all() as $timetable)
                                            <option value="{{ $timetable->id }}">
                                                {{ $timetable->session . ' ' . $timetable->semester . ' Timetable' }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="student-school">Select timetable</label>
                                </div>
                            </div>

                            <div class="col-12 text-center">
                                <button class="btn btn-primary w-100 py-3" type="submit">View Timetable</button>
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <p><strong>ADMIN LOGIN <a class="" href="{{ route('login') }}">HERE</a></strong>
                                </p>
                            </div>

                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
<!-- Callback End -->
