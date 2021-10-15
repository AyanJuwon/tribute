<template>
    <div class="comment-box submit-form" id="tribute">
        <h3 class="reply-title">Tell a story</h3>
        <br>
        <div class="comment-form">
            <div v-if="success !== ''" class="alert alert-success" role="alert">
                {{success}}
            </div>
            <form @submit="formSubmit" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <textarea v-model="story" class="form-control" cols="30" rows="6" placeholder="Tell a story....."></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>Image(Optional)</label>
                            <br><br>
                            <input v-on:change="onFileChange" type="file" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <button class="btn search-btn" style="background-color: #65594d;color:white">Publish</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                story: '',
                file: '',
                success: ''
            };
        },
        methods: {
            onFileChange(e){
                console.log(e.target.files[0]);
                this.file = e.target.files[0];
            },
            formSubmit(e) {
                e.preventDefault();
                let currentObj = this;

                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }

                let formData = new FormData();
                formData.append('file', this.file);

                axios.post('/story', formData, config)
                    .then(function (response) {
                        currentObj.success = response.data.success;
                    })
                    .catch(function (error) {
                        currentObj.output = error;
                    });
            }
        }
    }
</script>
