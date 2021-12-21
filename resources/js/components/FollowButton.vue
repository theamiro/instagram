<template>
    <button
        class="btn btn-primary btn-sm"
        @click="followUser()"
        v-text="buttonText"
    ></button>
</template>

<script>
export default {
    props: ["username", "follows"],
    data() {
        return {
            status: this.follows,
        };
    },
    methods: {
        followUser() {
            axios
                .post("/follow/" + this.username)
                .then(() => {
                    this.status = !this.status;
                })
                .catch((error) => {
                    if ((error.status = 401)) {
                        window.location = "/login";
                    }
                });
        },
    },
    computed: {
        buttonText() {
            return this.status ? "Unfollow" : "Follow";
        },
    },
};
</script>
