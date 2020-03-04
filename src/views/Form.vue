<template>
  <div>
    <fish-card fluid>
      <div slot="header">
        <h3>ใบตรวจเช็คบำรุงรักษา</h3>
      </div>
      <fish-row>
        <fish-form inline>
          <fish-col span="24" class="demo-col ">
            <fish-field label="ระบุเดือน" inline>
              <fish-select v-model="month" hint='..เดือน'>
                <fish-option index="1" content="1 เดือน"></fish-option>
                <fish-option index="3" content="3 เดือน"></fish-option>
              </fish-select>
            </fish-field>
          </fish-col>
        </fish-form>
      </fish-row>
      <fish-row>
        <fish-col span="12" class="demo-col ">
          <fish-form inline>
            <fish-field label="สถานที่ " inline>
              <h4> บ่อบำบัดน้ำเสีย </h4>
            </fish-field>
          </fish-form>
        </fish-col>
        <fish-col span="6" class="demo-col ">
          <fish-form inline>
            <fish-field label="ยี่ห้อ" inline>
              <h4>dd</h4>
            </fish-field>
          </fish-form>
        </fish-col>
        <fish-col span="6" class="demo-col ">
          <fish-form inline>
            <fish-field label="ON" inline>
              <h4>dd</h4>
            </fish-field>
          </fish-form>
        </fish-col>
      </fish-row>
      <fish-row>
        <fish-col span="12" class="demo-col ">
          <fish-form inline>
            <fish-field label="หมายเลขเครื่อง " inline>
              <h4> dd </h4>
            </fish-field>
          </fish-form>
        </fish-col>
        <fish-col span="12" class="demo-col ">
          <fish-form inline>
            <fish-field label="ID" inline>
              <h4>dd</h4>
            </fish-field>
          </fish-form>
        </fish-col>
      </fish-row>
      <fish-row>
        <fish-col span="12">
          <fish-form inline>
            <fish-field label="จุดติดตั้ง " inline>
              <h4> dd </h4>
            </fish-field>
          </fish-form>
        </fish-col>
        <fish-col span="12" >
          <fish-form inline>
            <fish-field label="วันที่" inline>
              <!-- format from moment js L = DD/MM/YYYY -->
               <fish-date-picker v-model="dateservice"  hint='เลือก' format='L'></fish-date-picker> 
               
            </fish-field>
          </fish-form>
        </fish-col>
      </fish-row>
      <fish-row>
        <fish-col span="6" class="demo-col demo-col2">col-6</fish-col>
        <fish-col span="6" class="demo-col demo-col2">col-6</fish-col>
        <fish-col span="6" class="demo-col demo-col2">col-6</fish-col>
        <fish-col span="6" class="demo-col demo-col2">col-6</fish-col>
      </fish-row>
    </fish-card>
  </div>
</template>

<script>
  export default {
    name: 'form',
    data() {
      return {
        month: '',
        dateservice:''
      }
    }
  }
</script>

<style>
  .demo-col {
    background: #e0f0fa;
    padding: 10px 0;
    text-align: center;
    margin-bottom: 5px;
  }
  .demo-col2 {
    background: #7dbcea;
  }
</style>