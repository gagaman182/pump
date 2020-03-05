<template>
  <div>
    <vue-scroll-progress-bar @complete="handleComplete" height="1rem" />
    <fish-card fluid color="blue">
      <fish-form ref="form">
        <div slot="header">
          <h3 class="head">ใบตรวจเช็คบำรุงรักษา</h3>
        </div>
        <fish-row>
          <fish-form inline>
            <fish-col span="24" class="demo-col ">
              <fish-field label="ระบุเดือน" name="month" :rules="[{required: true,message: 'วันที่เป็นค่าว่าง'}]" inline>
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
              <fish-field label="สถานที่: " inline>
                <h4> บ่อบำบัดน้ำเสีย </h4>
              </fish-field>
            </fish-form>
          </fish-col>
          <fish-col span="6" class="demo-col ">
            <fish-form inline>
              <fish-field label="ยี่ห้อ:" inline>
                <h4>dd</h4>
              </fish-field>
            </fish-form>
          </fish-col>
          <fish-col span="6" class="demo-col ">
            <fish-form inline>
              <fish-field label="ON:" inline>
                <h4>dd</h4>
              </fish-field>
            </fish-form>
          </fish-col>
        </fish-row>
        <fish-row>
          <fish-col span="12" class="demo-col ">
            <fish-form inline>
              <fish-field label="หมายเลขเครื่อง:" inline>
                <h4> dd </h4>
              </fish-field>
            </fish-form>
          </fish-col>
          <fish-col span="12" class="demo-col ">
            <fish-form inline>
              <fish-field label="ID:" inline>
                <h4>dd</h4>
              </fish-field>
            </fish-form>
          </fish-col>
        </fish-row>
        <fish-row>
          <fish-col span="12" class="demo-col ">
            <fish-form inline>
              <fish-field label="จุดติดตั้ง:" inline>
                <h4> dd </h4>
              </fish-field>
            </fish-form>
          </fish-col>
          <fish-col span="12">
            <fish-form ref="form" inline>
              <fish-field label="วันที่" name="dateservice" :rules="[{required: true,message: 'วันที่เป็นค่าว่าง'}]" inline>
                <!-- format from moment js L = DD/MM/YYYY -->
                <fish-date-picker v-model="dateservice" hint='ระบุวันที่' format='L'></fish-date-picker>
              </fish-field>
            </fish-form>
          </fish-col>
        </fish-row>
        <fish-row class="headsmall">
          <fish-col span="5" class="demo-col demo-col2">
            <h4>รายการ</h4>
          </fish-col>
          <fish-col span="6" class="demo-col demo-col2">
            <h4>แนวทางการตรวจเช็ค</h4>
          </fish-col>
          <fish-col span="7" class="demo-col demo-col2">
            <h4>สถานะ</h4>
          </fish-col>
          <fish-col span="6" class="demo-col demo-col2">
            <h4>หมายเหตุ</h4>
          </fish-col>
        </fish-row>
        <!-- แถว1 -->
        <fish-row>
          <fish-col span="5">
            <h5>ชุดสายไฟเครื่องปั้ม</h5>
          </fish-col>
          <fish-col span="6">
            <h5>ดูสภาพของสาย จุดจับยึด</h5>
          </fish-col>
          <fish-col span="4">
            <fish-checkboxes v-model="wire_1">
              <fish-checkbox index="1">พร้อมใช้</fish-checkbox>
            </fish-checkboxes>
            <fish-checkboxes v-model="wire_3">
              <fish-checkbox index=" 3">สายรั่ว</fish-checkbox>
            </fish-checkboxes>
          </fish-col>
          <fish-col span="3">
            <fish-checkboxes v-model="wire_2">
              <fish-checkbox index=" 2"> สายขาด</fish-checkbox>
            </fish-checkboxes>
            <fish-checkboxes v-model="wire_4">
              <fish-checkbox index="4">เปลี่ยน</fish-checkbox>
            </fish-checkboxes>
          </fish-col>
          <fish-col span="6">
            <center>
              <fish-input type="textarea" style="height: 80px; " v-model="wire_other" hint='ระบุ...'></fish-input>
            </center>
          </fish-col>
        </fish-row>
        <br>
        <hr>
        <!-- แถว2 -->
        <fish-row>
          <fish-col span="5">
            <h5>ซีลเครื่องปั้ม</h5>
          </fish-col>
          <fish-col span="6">
            <h5>สังเกตุด้วยสายตา ดูว่ามีการรั่วของน้ำ ความซึกหรอ</h5>
          </fish-col>
          <fish-col span="4
                              
                              ">
            <fish-checkboxes v-model="seal_1">
              <fish-checkbox index="1">พร้อมใช้</fish-checkbox>
            </fish-checkboxes>
            <fish-checkboxes v-model="seal_3">
              <fish-checkbox index=" 3">ชำรุด</fish-checkbox>
            </fish-checkboxes>
          </fish-col>
          <fish-col span="3">
            <fish-checkboxes v-model="seal_2">
              <fish-checkbox index=" 2"> มีรอยรั่วซึม</fish-checkbox>
            </fish-checkboxes>
            <fish-checkboxes v-model="seal_4">
              <fish-checkbox index="4">ส่งซ่อมบริษัท</fish-checkbox>
            </fish-checkboxes>
          </fish-col>
          <fish-col span="6">
            <center>
              <fish-input type="textarea" style="height: 80px; " v-model="seal_other" hint='ระบุ...'></fish-input>
            </center>
          </fish-col>
        </fish-row>
        <br>
        <hr>
        <!-- แถว3 -->
        <fish-row>
          <fish-col span="5">
            <h5>สภาพโดยรวม ของเครื่อง</h5>
          </fish-col>
          <fish-col span="6">
            <h5>ดูสี จุดแตกร้าว การกัดกรอน น๊อต/สกรู การสั่นสะเทือน</h5>
          </fish-col>
          <fish-col span="4">
            <fish-checkboxes v-model="condition_1">
              <fish-checkbox index="1">พร้อมใช้</fish-checkbox>
            </fish-checkboxes>
            <fish-checkboxes v-model="condition_3">
              <fish-checkbox index=" 3">แตกร้าว</fish-checkbox>
            </fish-checkboxes>
            <fish-checkboxes v-model="condition_5">
              <fish-checkbox index=" 5">ทาสีใหม่</fish-checkbox>
            </fish-checkboxes>
          </fish-col>
          <fish-col span="3">
            <fish-checkboxes v-model="condition_2">
              <fish-checkbox index=" 2/สกรู"> เปลี่ยนน๊อต/สกรู</fish-checkbox>
            </fish-checkboxes>
            <fish-checkboxes v-model="condition_4">
              <fish-checkbox index="4">มีการกัดกร่อน</fish-checkbox>
            </fish-checkboxes>
            <fish-checkboxes v-model="condition_6">
              <fish-checkbox index=" 6">ส่งซ่อมบริษัท</fish-checkbox>
            </fish-checkboxes>
          </fish-col>
          <fish-col span="6">
            <center>
              <fish-input type="textarea" style="height: 80px; " v-model="condition_other" hint='ระบุ...'></fish-input>
            </center>
          </fish-col>
        </fish-row>
        <br>
        <hr>
        <!-- แถว4 -->
        <fish-row>
          <fish-col span="5">
            <h5>ชุดใบพัดปั้ม</h5>
          </fish-col>
          <fish-col span="6">
            <h5>ดูสี จุดแตกร้าว การกัดกรอน น๊อต/สกรู การสั่นสะเทือน</h5>
          </fish-col>
          <fish-col span="4">
            <fish-checkboxes v-model="propeller_1">
              <fish-checkbox index="1">พร้อมใช้</fish-checkbox>
            </fish-checkboxes>
            <fish-checkboxes v-model="propeller_3">
              <fish-checkbox index=" 3">แตกร้าว</fish-checkbox>
            </fish-checkboxes>
            <fish-checkboxes v-model="propeller_5">
              <fish-checkbox index=" 5">สึกหรอ</fish-checkbox>
            </fish-checkboxes>
          </fish-col>
          <fish-col span="3">
            <fish-checkboxes v-model="propeller_2">
              <fish-checkbox index=" 2"> สันสะเทือน/เสียงดัง</fish-checkbox>
            </fish-checkboxes>
            <fish-checkboxes v-model="propeller_4">
              <fish-checkbox index="4">มีการกัดกร่อน</fish-checkbox>
            </fish-checkboxes>
            <fish-checkboxes v-model="propeller_6">
              <fish-checkbox index=" 6">ส่งซ่อมบริษัท</fish-checkbox>
            </fish-checkboxes>
          </fish-col>
          <fish-col span="6">
            <center>
              <fish-input type="textarea" style="height: 80px; " v-model="propeller_other" hint='ระบุ...'></fish-input>
            </center>
          </fish-col>
        </fish-row>
        <br>
        <hr>
        <!-- แถว5-->
        <fish-row>
          <fish-col span="5">
            <h5>หอยโข่งปั้ม</h5>
          </fish-col>
          <fish-col span="6">
            <h5>ดูจุดแตกร้าว ซึกหรอ การกัดกรอน</h5>
          </fish-col>
          <fish-col span="4">
            <fish-checkboxes v-model="snail_1">
              <fish-checkbox index="1">พร้อมใช้</fish-checkbox>
            </fish-checkboxes>
            <fish-checkboxes v-model="snail_3">
              <fish-checkbox index=" 3">แตกร้าว</fish-checkbox>
            </fish-checkboxes>
            <fish-checkboxes v-model="snail_5">
              <fish-checkbox index=" 5">สึกหรอ</fish-checkbox>
            </fish-checkboxes>
          </fish-col>
          <fish-col span="3">
            <fish-checkboxes v-model="snail_2">
              <fish-checkbox index=" 2">มีรอยร้าว</fish-checkbox>
            </fish-checkboxes>
            <fish-checkboxes v-model="snail_4">
              <fish-checkbox index="4">มีการกัดกร่อน</fish-checkbox>
            </fish-checkboxes>
            <fish-checkboxes v-model="snail_6">
              <fish-checkbox index=" 6">อุดตัน</fish-checkbox>
            </fish-checkboxes>
          </fish-col>
          <fish-col span="6">
            <center>
              <fish-input type="textarea" style="height: 80px; " v-model="snail_other" hint='ระบุ...'></fish-input>
            </center>
          </fish-col>
        </fish-row>
        <br>
        <hr>
        <!-- แถว6-->
        <fish-row>
          <fish-col span="5">
            <h5>ระดับน้ำมันเครื่อง</h5>
          </fish-col>
          <fish-col span="6">
            <h5>ดูระดับน้ำมันเครื่อง สีของน้ำมัน</h5>
          </fish-col>
          <fish-col span="4">
            <fish-checkboxes v-model="oil_1">
              <fish-checkbox index="1">พร้อมใช้</fish-checkbox>
            </fish-checkboxes>
            <fish-checkboxes v-model="oil_3">
              <fish-checkbox index=" 3">เติม</fish-checkbox>
            </fish-checkboxes>
            <fish-checkboxes v-model="oil_5">
              <fish-checkbox index=" 5">เปลี่ยน</fish-checkbox>
            </fish-checkboxes>
          </fish-col>
          <fish-col span="3">
            <fish-checkboxes v-model="oil_2">
              <fish-checkbox index=" 2">ต่ำกว่าระดับ</fish-checkbox>
            </fish-checkboxes>
            <fish-checkboxes v-model="oil_4">
              <fish-checkbox index="4">สีดำ/ค้น</fish-checkbox>
            </fish-checkboxes>
          </fish-col>
          <fish-col span="6">
            <center>
              <fish-input type="textarea" style="height: 80px; " v-model="oid_other" hint='ระบุ...'></fish-input>
            </center>
          </fish-col>
        </fish-row>
        <br>
        <hr>
        <!-- แถว7-->
        <fish-row>
          <fish-col span="5">
            <h5>อัดจาระบี</h5>
          </fish-col>
          <fish-col span="6">
            <h5>อัดจารบีตามจุดต่างๆ</h5>
          </fish-col>
          <fish-col span="4">
            <fish-checkboxes v-model="jarabi_1">
              <fish-checkbox index="1">พร้อมใช้</fish-checkbox>
            </fish-checkboxes>
          </fish-col>
          <fish-col span="3">
            <fish-checkboxes v-model="jarabi_2">
              <fish-checkbox index=" 2">อัดจารบี</fish-checkbox>
            </fish-checkboxes>
          </fish-col>
          <fish-col span="6">
            <center>
              <fish-input type="textarea" style="height: 80px; " v-model="jarabi_other" hint='ระบุ...'></fish-input>
            </center>
          </fish-col>
        </fish-row>
        <br>
        <hr>
        <!-- แถว8-->
        <fish-row>
          <fish-col span="5">
            <h5>ระดับน้ำมันเครื่อง</h5>
          </fish-col>
          <fish-col span="6">
            <h5>ดูระดับน้ำมันเครื่อง สีของน้ำมัน</h5>
          </fish-col>
          <fish-col span="4">
            <fish-checkboxes v-model="clean_1">
              <fish-checkbox index="1">ฉีดน้ำใช้แปรงขัด</fish-checkbox>
            </fish-checkboxes>
            <fish-checkboxes v-model="clean_3">
              <fish-checkbox index=" 3">ใช้โบว์เวอร์เปา</fish-checkbox>
            </fish-checkboxes>
          </fish-col>
          <fish-col span="3">
            <fish-checkboxes v-model="clean_2">
              <fish-checkbox index=" 2">ใช้ปั้มแรงดัน</fish-checkbox>
            </fish-checkboxes>
            <fish-checkboxes v-model="clean_4">
              <fish-checkbox index="4">ใช้ผ้าชุบน้ำเช็ด</fish-checkbox>
            </fish-checkboxes>
          </fish-col>
          <fish-col span="6">
            <center>
              <fish-input type="textarea" style="height: 80px; " v-model="clean_other" hint='ระบุ...'></fish-input>
            </center>
          </fish-col>
        </fish-row>
        <br>
        <hr>
        <!-- แถว9-->
        <fish-row>
          <fish-col span="5">
            <h5>ตรวจเช็คระบบ ควบคุมปั้ม</h5>
          </fish-col>
          <fish-col span="6">
            <h5>ตรวจเช็คอุปกรณ์/ทำความสะอาด</h5>
          </fish-col>
          <fish-col span="4">
            <fish-checkboxes v-model="system_1">
              <fish-checkbox index="1">พร้อมใช้</fish-checkbox>
            </fish-checkboxes>
            <fish-checkboxes v-model="system_3">
              <fish-checkbox index=" 3">เปลี่ยนอุปกรณ์</fish-checkbox>
            </fish-checkboxes>
            <fish-checkboxes v-model="system_5">
              <fish-checkbox index=" 5">ตรวจเช๊ค AUTO MAN ON OFF ตู้ควบคุม</fish-checkbox>
            </fish-checkboxes>
          </fish-col>
          <fish-col span="3">
            <fish-checkboxes v-model="system_2">
              <fish-checkbox index=" 2">ตรวจเช็คไฟโชว์</fish-checkbox>
            </fish-checkboxes>
            <fish-checkboxes v-model="system_4">
              <fish-checkbox index="4">ใช้โบว์เป้าทำความสะอาด</fish-checkbox>
            </fish-checkboxes>
          </fish-col>
          <fish-col span="6">
            <center>
              <fish-input type="textarea" style="height: 80px; " v-model="system_other" hint='ระบุ...'></fish-input>
            </center>
          </fish-col>
        </fish-row>
        <br>
        <hr>
        <!-- แถว10-->
        <fish-row>
          <fish-col span="5">
            <h5>ตรวจเช็คระบบ ควบคุมปั้ม</h5>
          </fish-col>
          <fish-col span="6">
            <h5>ตรวจเช็คอุปกรณ์/ทำความสะอาด</h5>
          </fish-col>
          <fish-col span="4">
            <fish-checkboxes v-model="sump_1">
              <fish-checkbox index="1">มีรอยร้าว</fish-checkbox>
            </fish-checkboxes>
            <fish-checkboxes v-model="sump_3">
              <fish-checkbox index=" 3">ตักเอาขยะออก</fish-checkbox>
            </fish-checkboxes>
            <fish-checkboxes v-model="sump_5">
              <fish-checkbox index=" 5">ฉีดน้ำใช้แปรงขัด</fish-checkbox>
            </fish-checkboxes>
            <fish-checkboxes v-model="sump_7">
              <fish-checkbox index=" 7">ใช้ปั้มแรงดันฉีด</fish-checkbox>
            </fish-checkboxes>
          </fish-col>
          <fish-col span="3">
            <fish-checkboxes v-model="sump_2">
              <fish-checkbox index=" 2">แจ้งหัวหน้า</fish-checkbox>
            </fish-checkboxes>
            <fish-checkboxes v-model="sump_4">
              <fish-checkbox index="4">ดูดเลนด้วยไดโว่</fish-checkbox>
            </fish-checkboxes>
            <fish-checkboxes v-model="sump_6">
              <fish-checkbox index="6">ทำการซ่อมแซม</fish-checkbox>
            </fish-checkboxes>
            <fish-checkboxes v-model="sump_8">
              <fish-checkbox index="8">แจ้งบริษัท</fish-checkbox>
            </fish-checkboxes>
          </fish-col>
          <fish-col span="6">
            <center>
              <fish-input type="textarea" style="height: 80px;  " v-model="sump_other" hint='ระบุ...'></fish-input>
            </center>
          </fish-col>
        </fish-row>
        <br>
        <hr>
        <fish-row>
          <fish-col span="2">
            <fish-button type="primary" @click="submitHandler">
              <vue-fontawesome icon="save" size="2"></vue-fontawesome> บันทึก</fish-button>
          </fish-col>
          <fish-col span="2">
            <fish-button type="negative">
              <vue-fontawesome icon="eraser" size="2"></vue-fontawesome> ยกเลิก</fish-button>
          </fish-col>
        </fish-row>
       
      </fish-form>
    </fish-card>
     <br>
    <fish-row>
      <fish-col span="24">
        <fish-cards cols="two">
          <fish-card color="red">
            <div slot="header"><strong class="headsmall">ผู้ปฏิบัติงาน</strong></div>
            <fish-row>
              <fish-col span="6">
                <h4>ชื่อ-นามสกุล</h4>
                <fish-input size='large' v-model="woker" hint='ชื่อ-นามสกุล'></fish-input>
              </fish-col>
              <fish-col span="6">
                <center>
                  <h4>ตรวจสอบแล้ว</h4>
                  <fish-switch v-model="woker_approve" :yesOrNo="[1, 0]"></fish-switch>
                </center>
              </fish-col>
              <fish-col span="12">
                <h4>หมายเหตุ</h4>
                <fish-input size='large' type="textarea" style="height: 80px;  width: 100%; " v-model="woker_other" hint='ระบุ...'></fish-input>
              </fish-col>
            </fish-row>
          </fish-card>
          <fish-card color="red">
            <div slot="header"><strong class="headsmall">หัวหน้าประปา สุขาภิบาล</strong></div>
            <fish-row>
              <fish-col span="6">
                <h4>ชื่อ-นามสกุล</h4>
                <fish-input size='large' v-model="boss_pump" hint='ชื่อ-นามสกุล'></fish-input>
              </fish-col>
              <fish-col span="6">
                <center>
                  <h4>ตรวจสอบแล้ว</h4>
                  <fish-switch v-model="boss_pump_approve" :yesOrNo="[1, 0]"></fish-switch>
                </center>
              </fish-col>
              <fish-col span="12">
                <h4>หมายเหตุ</h4>
                <fish-input size='large' type="textarea" style="height: 80px;  width: 100%; " v-model="boss_pump_other" hint='ระบุ...'></fish-input>
              </fish-col>
            </fish-row>
          </fish-card>
        </fish-cards>
        <fish-cards cols="two">
          <fish-card color="green">
            <div slot="header"><strong class="headsmall">ผู้ตรวจสอบ</strong></div>
            <fish-row>
              <fish-col span="6">
                <h4>ชื่อ-นามสกุล</h4>
                <fish-input size='large' v-model="inspector" hint='ชื่อ-นามสกุล'></fish-input>
              </fish-col>
              <fish-col span="6">
                <center>
                  <h4>ตรวจสอบแล้ว</h4>
                  <fish-switch v-model="inspector_approve" :yesOrNo="[1, 0]"></fish-switch>
                </center>
              </fish-col>
              <fish-col span="12">
                <h4>หมายเหตุ</h4>
                <fish-input size='large' type="textarea" style="height: 80px;  width: 100%; " v-model="inspector_other" hint='ระบุ...'></fish-input>
              </fish-col>
            </fish-row>
          </fish-card>
          <fish-card color="green">
            <div slot="header"><strong class="headsmall">รองผู้อำนวยการฝ่ายบริหาร</strong></div>
            <fish-row>
              <fish-col span="6">
                <h4>ชื่อ-นามสกุล</h4>
                <fish-input size='large' v-model="manage" hint='ชื่อ-นามสกุล'></fish-input>
              </fish-col>
              <fish-col span="6">
                <center>
                  <h4>ตรวจสอบแล้ว</h4>
                  <fish-switch v-model="manage_approve" :yesOrNo="[1, 0]"></fish-switch>
                </center>
              </fish-col>
              <fish-col span="12">
                <h4>หมายเหตุ</h4>
                <fish-input size='large' type="textarea" style="height: 80px;  width: 100%; " v-model="manage_other" hint='ระบุ...'></fish-input>
              </fish-col>
            </fish-row>
          </fish-card>
        </fish-cards>
      </fish-col>
    </fish-row>
  </div>
</template>

<script>
  export default {
    name: 'form',
    data() {
      return {
        month: '',
        dateservice: '',
        wire_1: '',
        wire_2: '',
        wire_3: '',
        wire_4: '',
        wire_other: '',
        seal_1: '',
        seal_2: '',
        seal_3: '',
        seal_4: '',
        seal_other: '',
        condition_1: '',
        condition_2: '',
        condition_3: '',
        condition_4: '',
        condition_5: '',
        condition_6: '',
        condition_other: '',
        propeller_1: '',
        propeller_2: '',
        propeller_3: '',
        propeller_4: '',
        propeller_5: '',
        propeller_6: '',
        propeller_other: '',
        snail_1: '',
        snail_2: '',
        snail_3: '',
        snail_4: '',
        snail_5: '',
        snail_6: '',
        snail_other: '',
        oil_1: '',
        oil_2: '',
        oil_3: '',
        oil_4: '',
        oil_5: '',
        oil_other: '',
        system_1: '',
        system_2: '',
        system_3: '',
        system_4: '',
        system_5: '',
        system_other: '',
        sump_1: '',
        sump_2: '',
        sump_3: '',
        sump_4: '',
        sump_5: '',
        sump_6: '',
        sump_7: '',
        sump_8: '',
        sump_other: '',
        woker: '',
        woker_approve: '',
        woker_other: '',
        boss_pump: '',
        boss_pump_approve: '',
        boss_pump_other: '',
        inspector: '',
        inspector_approve: '',
        inspector_other: '',
        manage: '',
        manage_approve: 0,
        manage_other: '',
      }
    },
    methods: {
      submitHandler() {
        this.$refs.form.validate((valid) => {
          console.log(valid)
        })
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
  .head {
    font-family: 'Sriracha';
    text-shadow: 4px 4px 4px #aaa;
  }
  .headsmall {
    font-family: 'Sriracha';
    text-shadow: 2px 2px 2px #aaa;
  }
</style>