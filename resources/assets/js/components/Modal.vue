<template>
    <!-- template for the modal component -->
    <script type="text/x-template" id="modal-template">
        <transition name="modal">
            <div class="modal-mask">
                <div class="modal-wrapper">
                    <div class="modal-container">

                        <div class="modal-header">
                            <slot name="header">
                                Título
                            </slot>
                        </div>

                        <div class="modal-body">
                            <slot name="body">
                                Cuerpo
                            </slot>
                        </div>

                        <div class="modal-footer">
                            <slot name="footer">
                                Botones
                            </slot>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </script>
</template>
<script>
    export default {
        mounted() {
            document.body.addEventListener('keyup', e => {
                if (e.keyCode === 27) {
                    this.$emit('close')
                }
            })
        }
    }
</script>
