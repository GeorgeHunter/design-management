<template>
    <div class="list-group-item level spread" :class="'file-' + file.id">
        <div class="">
            <div>{{ file.identifier }} - {{ file.status }}</div>
            <div class="small text-muted">
                {{ formattedDate }} - {{ file.commentCount }} {{ file.commentCount === 1 ? 'comment' : 'comments' }} -
                <span class="text-danger interactive" @click="deleteFileVersion(file.id)">Delete</span>
            </div>
        </div>
        <a :href="file.path">
            <span class="glyphicon glyphicon-download-alt"></span>
        </a>
    </div>
</template>

<script>
    export default {


        props: ['version'],

        mounted() {
            console.log(this.version);
        },

        data() {
            return {
                file : JSON.parse(this.version),
            }
        },

        computed: {
            formattedDate : function() {
                return moment(this.file.created_at).format('Y-m-d');
            },
            plural: function() {
                return pluralize('comment', this.file.commentCount);
            }
        },

        methods: {
            deleteFileVersion(version) {
                let proceed = confirm('Are you sure you want to remove this version - this can\'t be undone');
                if (proceed) {
                    axios.delete('/file-version/delete/' + version);
                    $('.file-' + version).fadeOut();
                }
            }
        }

    }
</script>
