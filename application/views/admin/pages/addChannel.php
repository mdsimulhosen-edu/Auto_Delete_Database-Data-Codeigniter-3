<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Add Channel</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home Page</a></li>
                        <li class="breadcrumb-item active">Add Channel</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="<?php echo base_url('channels') ?>" class="btn btn-dark px-3">
                        << Back To Channel List</a>
                </div>
                <div class="card-body p-4">
                    <form action="<?php echo base_url('admin/add_channel') ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="mb-3">
                                <label for="matchType">CHANNEL CATEGORY</label>
                                <select class="form-select" name="channelCategory" id="channelCategory">
                                    <option value="">Select Category</option>
                                    <?php
                                    foreach ($channel_category as $category) { ?>
                                        <option value="<?php echo $category->channel_category; ?>"><?php echo $category->channel_category; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="channelName">CHANNEL NAME</label>
                                <input id="channelName" name="channelName" type="text" class="form-control" placeholder="Channel Name">
                            </div>
                            <div class="mb-3">
                                <label for="channel_logo">IMAGE</label>
                                <input id="channel_logo" name="channel_logo" type="file" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="channeLink">CHANNEL LINK</label>
                                <input id="channeLink" name="channeLink" type="url" class="form-control" placeholder="https://Example.com">
                            </div>
                            <div class="mb-3">
                                <label for="public_key">Public Key</label>
                                <input id="public_key" name="public_key" readonly type="text" class="form-control" placeholder="key">
                            </div>
                            <div class="mb-3">
                                <label for="private_key">Private Key</label>
                                <input id="private_key" name="private_key" readonly type="text" class="form-control" placeholder="key">
                            </div>
                            <div class="mb-3">
                                <label for="video_id">Video ID</label>
                                <input id="video_id" name="video_id" readonly type="text" class="form-control" placeholder="key">
                            </div>
                            <div class="mb-3">
                                <label for="link_enc">Link Encrypt</label>
                                <input id="link_enc" name="link_enc" type="text" class="form-control" placeholder="key">
                            </div>
                            <div class="mb-3">
                                <label for="js_enc">JS Link Encrypt</label>
                                <input id="js_enc" name="js_enc" type="text" class="form-control" placeholder="key">
                            </div>
                            <div class="mb-3">
                                <label for="link_enc">Video JS</label>
                                <select class="form-select" name="video_js" id="video_js">
                                    <option value="0">Select Video JS Scrypt</option>
                                    <?php
                                    foreach (VIDEOJS as $v) { ?>
                                        <option value="<?php echo $v ?>"><?php echo $v ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="link_enc">Stream JS</label>
                                <select class="form-select" name="stream_js" id="stream_js">
                                    <option value="0">Select Stream JS Scrypt</option>
                                    <?php
                                    foreach (STREAMJS as $v) { ?>
                                        <option value="<?php echo $v ?>"><?php echo $v ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="link_enc">Main Script</label>
                                <select class="form-select" name="script_js" id="script_js">
                                    <option value="0">Select Scrypt</option>
                                    <?php
                                    foreach (SCRYPT as $v) { ?>
                                        <option value="<?php echo $v ?>"><?php echo $v ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="channeLink">Generate key</label>
                                <a onclick="generate()" id="key_genarator" class="btn btn-success">Generate</a>
                                <a onclick="encrypt()" id="encrypter" class="btn btn-danger">Encrypt Code</a>
                            </div>
                            <div class="d-flex flex-wrap gap-2 float-end  mt-4">
                                <button type="reset" class="btn btn-secondary waves-effect waves-light me-3">Reset</button>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Insert</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<script>
    $(document).ready(function() {
        $("#status").change(function() {
            if ($(this).prop('checked')) {
                $("#showSlider").val(1);
            } else {
                $("#showSlider").val(0);
            }
        });
    });
    $('#encrypter').hide();

    function generate() {
        $('#public_key').val(Password.generate(30));
        $('#private_key').val(Password.generate(30));
        $('#video_id').val(Password.generate(20));
        $('#encrypter').show();
        $('#key_genarator').hide();
    }

    function encrypt() {
        var link = $('#channeLink').val(),
            vjs = $('#video_js').val(),
            sjs = $('#stream_js').val(),
            mjs = $('#script_js').val(),
            code = '',
            enc_link = '',
            public_key = $('#public_key').val(),
            private_key = $('#private_key').val(),
            video_id = $('#video_id').val();

        if (link.length > 0) {
            if (vjs != 0 && sjs != 0 && mjs != 0) {
                var x = '["' + vjs + '.js","' + sjs + '.js"]';
                code = mjs + '.js?k1=' + enc(private_key, public_key) + '&k2=' + public_key + '&v1=' + enc(video_id, public_key) + '&sc=' + enc( x, private_key);
                enc_link = enc(link, private_key);
                $('#js_enc').val(code), $('#link_enc').val(enc_link);
            } else {
                alert('select your scrypt');
            }
        } else {
            alert('type your m3u8/mp4/mkv link');
        }
    }

    function enc(t, k) {
        return CryptoJS.AES.encrypt(t, k).toString()
    }
    var Password = {
        _pattern: /[a-zA-Z0-9]/,

        _getRandomByte: function() {
            if (window.crypto && window.crypto.getRandomValues) {
                var result = new Uint8Array(1);
                window.crypto.getRandomValues(result);
                return result[0];
            } else if (window.msCrypto && window.msCrypto.getRandomValues) {
                var result = new Uint8Array(1);
                window.msCrypto.getRandomValues(result);
                return result[0];
            } else {
                return Math.floor(Math.random() * 256);
            }
        },

        generate: function(length) {
            return Array.apply(null, {
                    'length': length
                })
                .map(function() {
                    var result;
                    while (true) {
                        result = String.fromCharCode(this._getRandomByte());
                        if (this._pattern.test(result)) {
                            return result;
                        }
                    }
                }, this)
                .join('');
        }

    };
</script>