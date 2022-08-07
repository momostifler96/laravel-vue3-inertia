<template>
    <div class="fixed top-10 m-6 z-50">
        <div v-if="$page.props.flash.success" class="">
            {{ showFlash('success', $page.props.flash.success) }}
        </div>
        <div v-if="$page.props.flash.info" class="">
            {{ showFlash('info', $page.props.flash.info) }}
        </div>
        <div v-if="$page.props.flash.warning" class="">
            {{ showFlash('warning', $page.props.flash.warning) }}
        </div>
        <div v-if="$page.props.flash.error" class="">
            {{ showFlash('error', $page.props.flash.error) }}
        </div>
    </div>
</template>
<script>
export default {
    methods: {
        showFlash(key, message) {
            switch (key) {
                case 'success':
                    toast.fire({text:message,icon:"success"});
                    break;
                case 'info':
                    toast.fire({text:message,icon:"warning"});
                    break;
                case 'warning':
                    toast.fire({text:message,icon:"warning"});
                    break;
                case 'error':
                    toast.fire({text:message,icon:"error"});
                    break;
                default:
                    break;
            }
        }
    }
};

</script>
