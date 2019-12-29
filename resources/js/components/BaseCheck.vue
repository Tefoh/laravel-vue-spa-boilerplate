<template>
    <div class="form-check">
        <label class="form-check-label">
            {{ label }}
            <input class="form-check-input"
                type="checkbox"
                :id="name"
                @change="updateInput"
                :value="valueProp"
                :class="{ 'is-invalid': $parent[this.form].errors.has(fieldName), classes }"
                v-bind="$attrs"
            >
            <span class="form-check-sign">
                <span class="check"></span>
            </span>
        </label>
        <has-error :form="$parent[this.form]" :field="fieldName"></has-error>
    </div>
</template>

<script>
    import { HasError } from "vform";

    export default {
        name: "BaseCheck",
        inheritAttrs: false,
        props: {
            label: {
                type: String,
                default: ''
            },
            name: {
                type: String,
                default: ''
            },
            classes: {
                type: String,
                default: ''
            },
            value: {
                type: [Boolean, String],
                default: false
            },
            form: {
                type: String,
                default: 'form'
            },
            field: {
                type: String,
                default: ''
            }
        },
        components: {
            HasError
        },
        data() {
            return {
                valueProp: !! this.value,
            }
        },
        computed: {
            fieldName() {
                return this.field ? this.field : this.name;
            }
        },
        methods: {
            updateInput() {
                let value = !! this.valueProp;
                this.$emit('input', ! value);
                this.valueProp = ! value;
            },
        }
    }
</script>

<style scoped>

</style>
