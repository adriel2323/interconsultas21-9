<template>
    <div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="code_id" class="label-control">Seleccione un código</label>
                <select class="form-control chosen-select" name="code_id">
                    <option v-for="(code, index) in codes" value="code.id">{{ code.description }}</option>
                </select>
            </div>
        </div>

        <modal v-if="showModal" @close="showModal = false"></modal>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                showModal: false
            }
        },
        props: {
            codes: {
                type: Array,
                validation: required
            }
        },
        methods: {

        },
        computed: {

        },
        mounted() {
            console.log('Componente montado')
        }
    }
</script>