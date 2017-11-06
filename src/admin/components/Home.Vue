<template>
    <div>
        <el-tabs v-model="current_tab" :tab-position="tabPosition" type="border-card">
            <el-tab-pane name="general_settings" label="General Settings">
                Fine There, How are you?
            </el-tab-pane>
            <el-tab-pane name="button_settings" label="Button Styling">
                
            </el-tab-pane>
            <el-tab-pane name="form_settings" label="Form Styling">
                
            </el-tab-pane>
            <el-tab-pane name="notification_settings" label="Notifications">
                
            </el-tab-pane>
        </el-tabs>
    </div>
</template>

<script type="text/babel">
    export default {
        name: 'home',
        data() {
            return {
                tabPosition: 'top',
                current_tab: 'general_settings'
            }
        },
        methods: {
            
        }
    }
</script> 