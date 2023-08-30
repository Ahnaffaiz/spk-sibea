<div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Confusion Matrix Promethee</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>TP</th>
                                    <th>TN</th>
                                    <th>FP</th>
                                    <th>FN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$promethee['TP']}}</td>
                                    <td>{{$promethee['TN']}}</td>
                                    <td>{{$promethee['FP']}}</td>
                                    <td>{{$promethee['FN']}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Akurasi</th>
                                    <td>{{$promethee['accuration']}}%</td>
                                </tr>
                                <tr>
                                    <th>Presisi</th>
                                    <td>{{$promethee['precission']}}%</td>
                                </tr>
                                <tr>
                                    <th>Sensitifitas</th>
                                    <td>{{$promethee['sensitifity']}}%</td>
                                </tr>
                                <tr>
                                    <th>F-Score</th>
                                    <td>{{$promethee['fscore']}}%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Confusion Matrix Ahp</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>TP</th>
                                    <th>TN</th>
                                    <th>FP</th>
                                    <th>FN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$ahp['TP']}}</td>
                                    <td>{{$ahp['TN']}}</td>
                                    <td>{{$ahp['FP']}}</td>
                                    <td>{{$ahp['FN']}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Akurasi</th>
                                    <td>{{$ahp['accuration']}}%</td>
                                </tr>
                                <tr>
                                    <th>Presisi</th>
                                    <td>{{$ahp['precission']}}%</td>
                                </tr>
                                <tr>
                                    <th>Sensitifitas</th>
                                    <td>{{$ahp['sensitifity']}}%</td>
                                </tr>
                                <tr>
                                    <th>F-Score</th>
                                    <td>{{$ahp['fscore']}}%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
      </div>
</div>
