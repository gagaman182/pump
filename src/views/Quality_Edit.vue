<template>
  <div>
    <vue-scroll-progress-bar
      @complete="handleComplete"
      height="1rem"
      backgroundColor="navy"
    />
    <Account />
    <fish-card fluid color="teal">
      <div slot="header">
        <h3 class="head">
          <i class="material-icons white-text">waves</i>แบบตรวจสอบวัดคุณภาพน้ำ
        </h3>
      </div>
      <fish-form ref="form" inline>
        <fish-row>
          <fish-col span="23">
            <fish-field
              span="6"
              label="วันที่วัดคุณภาพน้ำ"
              name="dateservice"
              :rules="[{required: true, message: 'วันที่เป็นค่าว่าง'}]"
            >
              <!-- format from moment js L = DD/MM/YYYY -->
              <fish-date-picker
                v-model="input.dateservice"
                hint="ระบุวันที่"
                format="L"
              ></fish-date-picker> </fish-field
          ></fish-col>

          <fish-col span="1"
            ><H3 class="idcolor">ใบที่. {{ this.input.num }}</H3></fish-col
          >
        </fish-row>
        <fish-divider></fish-divider>

        <fish-row gutter=".5">
          <fish-col span="6"
            ><div class="demo-col demo-col2"><h4>PH (5-9)</h4></div></fish-col
          >
          <fish-col span="4"
            ><div class="demo-col demo-col2">
              <h4>DO (1-2 mg/L)</h4>
            </div></fish-col
          >
          <fish-col span="4"
            ><div class="demo-col demo-col2">
              <h4>Temp (25-35 C)</h4>
            </div></fish-col
          >
          <fish-col span="4"
            ><div class="demo-col demo-col2">
              <h4>V30 (300-800)ml/L</h4>
            </div></fish-col
          >
          <fish-col span="4"
            ><div class="demo-col demo-col2">
              <h4>ครอรีน (0.1-1.5 ppm)</h4>
            </div></fish-col
          >
          <fish-col span="2"
            ><div class="demo-col demo-col2">
              <h4>หมายเหตุ</h4>
            </div></fish-col
          >
        </fish-row>
        <fish-row gutter=".5">
          <fish-col span="2"
            ><div class="demo-col demo-col2">
              <h4>แหล่งที่ตรวจสอบ</h4>
            </div></fish-col
          >
          <fish-col span="2"
            ><div class="demo-col demo-col2">
              <h4>เช้า</h4>
            </div></fish-col
          >
          <fish-col span="2"
            ><div class="demo-col demo-col2">
              <h4>เย็น</h4>
            </div></fish-col
          >
          <fish-col span="2"
            ><div class="demo-col demo-col2">
              <h4>เช้า</h4>
            </div></fish-col
          >
          <fish-col span="2"
            ><div class="demo-col demo-col2">
              <h4>เย็น</h4>
            </div></fish-col
          >
          <fish-col span="2"
            ><div class="demo-col demo-col2">
              <h4>เช้า</h4>
            </div></fish-col
          >
          <fish-col span="2"
            ><div class="demo-col demo-col2">
              <h4>เย็น</h4>
            </div></fish-col
          >
          <fish-col span="2"
            ><div class="demo-col demo-col2">
              <h4>เช้า</h4>
            </div></fish-col
          >
          <fish-col span="2"
            ><div class="demo-col demo-col2">
              <h4>เย็น</h4>
            </div></fish-col
          >
          <fish-col span="2"
            ><div class="demo-col demo-col2">
              <h4>เช้า</h4>
            </div></fish-col
          >
          <fish-col span="2"
            ><div class="demo-col demo-col2">
              <h4>เย็น</h4>
            </div></fish-col
          >
        </fish-row>
        <fish-row gutter=".5">
          <fish-col span="2">
            <div class="demo-col demo-col2">
              <h4>บ่อปรับสภาพ</h4>
            </div></fish-col
          >
          <fish-col span="2">
            <number-input
              controls
              v-model="input.pumpadjuct1"
              :step="0.1"
            ></number-input>
          </fish-col>
          <fish-col span="2">
            <number-input
              controls
              v-model="input.pumpadjuct2"
              :step="0.1"
            ></number-input>
          </fish-col>
          <fish-col span="2">
            <number-input
              controls
              v-model="input.pumpadjuctdo1"
              :step="0.1"
            ></number-input>
          </fish-col>
          <fish-col span="2">
            <number-input
              controls
              v-model="input.pumpadjuctdo2"
              :step="0.1"
            ></number-input>
          </fish-col>
          <fish-col span="2">
            <number-input
              controls
              v-model="input.pumpadjucttemp1"
              :step="0.1"
            ></number-input>
          </fish-col>
          <fish-col span="2">
            <number-input
              controls
              v-model="input.pumpadjucttemp2"
              :step="0.1"
            ></number-input>
          </fish-col>
          <fish-col span="2">
            <number-input
              controls
              v-model="input.pumpadjuctv301"
              :step="0.1"
            ></number-input>
          </fish-col>
          <fish-col span="2">
            <number-input
              controls
              v-model="input.pumpadjuctv302"
              :step="0.1"
            ></number-input>
          </fish-col>
          <fish-col span="2">
            <number-input
              controls
              v-model="input.pumpadjuctchlorine1"
              :step="0.1"
            ></number-input>
          </fish-col>
          <fish-col span="2">
            <number-input
              controls
              v-model="input.pumpadjuctchlorine2"
              :step="0.1"
            ></number-input>
          </fish-col>
          <fish-col span="2">
            <fish-input
              size="large"
              type="textarea"
              style="height: 10%;  width: 100%; "
              v-model="input.pumpadjuctother"
              hint="ระบุ"
            ></fish-input>
          </fish-col>
        </fish-row>

        <fish-row gutter=".5">
          <fish-col span="2">
            <div class="demo-col demo-col2">
              <h4>บ่อเติมอากาศ</h4>
            </div></fish-col
          >
          <fish-col span="2">
            <number-input
              controls
              v-model="input.aeration1"
              :step="0.1"
            ></number-input>
          </fish-col>
          <fish-col span="2">
            <number-input
              controls
              v-model="input.aeration2"
              :step="0.1"
            ></number-input>
          </fish-col>
          <fish-col span="2">
            <number-input
              controls
              v-model="input.aerationdo1"
              :step="0.1"
            ></number-input>
          </fish-col>
          <fish-col span="2">
            <number-input
              controls
              v-model="input.aerationdo2"
              :step="0.1"
            ></number-input>
          </fish-col>
          <fish-col span="2">
            <number-input
              controls
              v-model="input.aerationtemp1"
              :step="0.1"
            ></number-input>
          </fish-col>
          <fish-col span="2">
            <number-input
              controls
              v-model="input.aerationtemp2"
              :step="0.1"
            ></number-input>
          </fish-col>
          <fish-col span="2">
            <number-input
              controls
              v-model="input.aerationtv301"
              :step="0.1"
            ></number-input>
          </fish-col>
          <fish-col span="2">
            <number-input
              controls
              v-model="input.aerationtv302"
              :step="0.1"
            ></number-input>
          </fish-col>
          <fish-col span="2">
            <number-input
              controls
              v-model="input.aerationchlorine1"
              :step="0.1"
            ></number-input>
          </fish-col>
          <fish-col span="2">
            <number-input
              controls
              v-model="input.aerationchlorine2"
              :step="0.1"
            ></number-input>
          </fish-col>
          <fish-col span="2">
            <fish-input
              size="large"
              type="textarea"
              style="height: 10%;  width: 100%; "
              v-model="input.aerationother"
              hint="ระบุ"
            ></fish-input>
          </fish-col>
        </fish-row>

        <fish-row gutter=".5">
          <fish-col span="2">
            <div class="demo-col demo-col2">
              <h4>บ่อตกตะกอน</h4>
            </div></fish-col
          >
          <fish-col span="2">
            <number-input
              controls
              v-model="input.silt1"
              :step="0.1"
            ></number-input>
          </fish-col>
          <fish-col span="2">
            <number-input
              controls
              v-model="input.silt2"
              :step="0.1"
            ></number-input>
          </fish-col>
          <fish-col span="2">
            <number-input
              controls
              v-model="input.siltdo1"
              :step="0.1"
            ></number-input>
          </fish-col>
          <fish-col span="2">
            <number-input
              controls
              v-model="input.siltdo2"
              :step="0.1"
            ></number-input>
          </fish-col>
          <fish-col span="2">
            <number-input
              controls
              v-model="input.silttemp1"
              :step="0.1"
            ></number-input>
          </fish-col>
          <fish-col span="2">
            <number-input
              controls
              v-model="input.silttemp2"
              :step="0.1"
            ></number-input>
          </fish-col>
          <fish-col span="2">
            <number-input
              controls
              v-model="input.siltv301"
              :step="0.1"
            ></number-input>
          </fish-col>
          <fish-col span="2">
            <number-input
              controls
              v-model="input.siltv302"
              :step="0.1"
            ></number-input>
          </fish-col>
          <fish-col span="2">
            <number-input
              controls
              v-model="input.siltchlorine1"
              :step="0.1"
            ></number-input>
          </fish-col>
          <fish-col span="2">
            <number-input
              controls
              v-model="input.siltchlorine2"
              :step="0.1"
            ></number-input>
          </fish-col>
          <fish-col span="2">
            <fish-input
              size="large"
              type="textarea"
              style="height: 10%;  width: 100%; "
              v-model="input.siltother"
              hint="ระบุ"
            ></fish-input>
          </fish-col>
        </fish-row>
        <fish-row gutter=".5">
          <fish-col span="2">
            <div class="demo-col demo-col2">
              <h4>บ่อคลอรีน</h4>
            </div></fish-col
          >
          <fish-col span="2">
            <number-input
              controls
              v-model="input.chlorine1"
              :step="0.1"
            ></number-input>
          </fish-col>
          <fish-col span="2">
            <number-input
              controls
              v-model="input.chlorine2"
              :step="0.1"
            ></number-input>
          </fish-col>
          <fish-col span="2">
            <number-input
              controls
              v-model="input.chlorinedo1"
              :step="0.1"
            ></number-input>
          </fish-col>
          <fish-col span="2">
            <number-input
              controls
              v-model="input.chlorinedo2"
              :step="0.1"
            ></number-input>
          </fish-col>
          <fish-col span="2">
            <number-input
              controls
              v-model="input.chlorinetemp1"
              :step="0.1"
            ></number-input>
          </fish-col>
          <fish-col span="2">
            <number-input
              controls
              v-model="input.chlorinetemp2"
              :step="0.1"
            ></number-input>
          </fish-col>
          <fish-col span="2">
            <number-input
              controls
              v-model="input.chlorinev301"
              :step="0.1"
            ></number-input>
          </fish-col>
          <fish-col span="2">
            <number-input
              controls
              v-model="input.chlorinev302"
              :step="0.1"
            ></number-input>
          </fish-col>
          <fish-col span="2">
            <number-input
              controls
              v-model="input.chlorinechlorine1"
              :step="0.1"
            ></number-input>
          </fish-col>
          <fish-col span="2">
            <number-input
              controls
              v-model="input.chlorinechlorine2"
              :step="0.1"
            ></number-input>
          </fish-col>
          <fish-col span="2">
            <fish-input
              size="large"
              type="textarea"
              style="height: 10%;  width: 100%; "
              v-model="input.chlorineother"
              hint="ระบุ"
            ></fish-input>
          </fish-col>
        </fish-row>
        <fish-row gutter=".5">
          <fish-col span="4"
            ><h4>หมายเหตุ -เวลาเช้า ประมาณ 9.00 น.</h4>
          </fish-col>
        </fish-row>
        <fish-row gutter=".5">
          <fish-col span="4" offset="1"
            ><h4>-เวลาบ่าย ประมาณ 15.00 น.</h4>
          </fish-col>
        </fish-row>
        <fish-row gutter=".5">
          <fish-col span="24">
            <h4>บันทึกเพิ่มเติม</h4>
            <fish-input
              size="large"
              type="textarea"
              style="height: 80px;  width: 100%; "
              v-model="input.others"
              hint="ระบุ"
            ></fish-input>
          </fish-col>
        </fish-row>

        <fish-row gutter=".5">
          <fish-col span="4" offset="21">
            <fish-fields>
              <fish-field>
                <fish-input
                  v-model="input.woker"
                  label="ผู้ดูแล "
                  hint="ระบุ"
                ></fish-input>
              </fish-field>
            </fish-fields>
          </fish-col>
        </fish-row>
        <fish-row>
          <fish-col>
            <fish-fields>
              <fish-field>
                <fish-button type="primary" @click="submitHandler">
                  <vue-fontawesome icon="save" size="2"></vue-fontawesome
                  >บันทึก</fish-button
                >
              </fish-field>
              <fish-field>
                <fish-button type="negative" @click="clear">
                  <vue-fontawesome icon="eraser" size="2"></vue-fontawesome
                  >ลบ</fish-button
                >
              </fish-field>
            </fish-fields>
          </fish-col>
        </fish-row>
      </fish-form>
    </fish-card>
  </div>
</template>
<script>
import axios from 'axios';
import {APIPath} from '../../service/APIPath';
// popup alert
import swal from 'sweetalert';
const apiPath = new APIPath();
import Account from '@/components/Account.vue';
export default {
  name: 'qulity',
  components: {
    Account,
  },
  data() {
    return {
      input: {
        num: '',
        dateservice: '',
        pumpadjuct1: '',
        pumpadjuct2: '',
        pumpadjuctdo1: '',
        pumpadjuctdo2: '',
        pumpadjucttemp1: '',
        pumpadjucttemp2: '',
        pumpadjuctv301: '',
        pumpadjuctv302: '',
        pumpadjuctchlorine1: '',
        pumpadjuctchlorine2: '',
        pumpadjuctother: '',
        aeration1: '',
        aeration2: '',
        aerationdo1: '',
        aerationdo2: '',
        aerationtemp1: '',
        aerationtemp2: '',
        aerationtv301: '',
        aerationtv302: '',
        aerationchlorine1: '',
        aerationchlorine2: '',
        aerationother: '',
        silt1: '',
        silt2: '',
        siltdo1: '',
        siltdo2: '',
        silttemp1: '',
        silttemp2: '',
        siltv301: '',
        siltv302: '',
        siltchlorine1: '',
        siltchlorine2: '',
        siltother: '',
        chlorine1: '',
        chlorine2: '',
        chlorinedo1: '',
        chlorinedo2: '',
        chlorinetemp1: '',
        chlorinetemp2: '',
        chlorinev301: '',
        chlorinev302: '',
        chlorinechlorine1: '',
        chlorinechlorine2: '',
        chlorineother: '',

        others: '',
        woker: '',
        ok: '',
        pump_detail: '',
      },
      num: this.$route.params.id,
      romove_message: '',
      form: {
        token: '',
        level: '',
        user: '',
      },
    };
  },
  methods: {
    //บันทึกฟอร์มเช็ค
    submitHandler() {
      if (this.form.level == 'เจ้าหน้าที่') {
        this.input.woker = this.form.user;
        this.$refs.form.validate((valid) => {
          // console.log(valid);
          if (valid === false) {
            // this.$message.error('แจ้งเตือน: ท่านยังกรอกข้อมูลไม่ครบ', 5000);
            swal({
              title: 'แจ้งเตือน!',
              text: 'ท่านยังกรอกข้อมูลไม่ครบ!',
              icon: 'error',
              button: 'ปิด',
            });
          } else {
            axios
              .get(`${apiPath.getBaseUrl()}update_water_detail.php`, {
                params: {
                  num: this.input.num,
                  dateservice: this.input.dateservice,
                  pumpadjuct1: this.input.pumpadjuct1,
                  pumpadjuct2: this.input.pumpadjuct2,
                  pumpadjuctdo1: this.input.pumpadjuctdo1,
                  pumpadjuctdo2: this.input.pumpadjuctdo2,
                  pumpadjucttemp1: this.input.pumpadjucttemp1,
                  pumpadjucttemp2: this.input.pumpadjucttemp2,
                  pumpadjuctv301: this.input.pumpadjuctv301,
                  pumpadjuctv302: this.input.pumpadjuctv302,
                  pumpadjuctchlorine1: this.input.pumpadjuctchlorine1,
                  pumpadjuctchlorine2: this.input.pumpadjuctchlorine2,
                  pumpadjuctother: this.input.pumpadjuctother,
                  aeration1: this.input.aeration1,
                  aeration2: this.input.aeration2,
                  aerationdo1: this.input.aerationdo1,
                  aerationdo2: this.input.aerationdo2,
                  aerationtemp1: this.input.aerationtemp1,
                  aerationtemp2: this.input.aerationtemp2,
                  aerationtv301: this.input.aerationtv301,
                  aerationtv302: this.input.aerationtv302,
                  aerationchlorine1: this.input.aerationchlorine1,
                  aerationchlorine2: this.input.aerationchlorine2,
                  aerationother: this.input.aerationother,
                  silt1: this.input.silt1,
                  silt2: this.input.silt2,
                  siltdo1: this.input.siltdo1,
                  siltdo2: this.input.siltdo2,
                  silttemp1: this.input.silttemp1,
                  silttemp2: this.input.silttemp2,
                  siltv301: this.input.siltv301,
                  siltv302: this.input.siltv302,
                  siltchlorine1: this.input.siltchlorine1,
                  siltchlorine2: this.input.siltchlorine2,
                  siltother: this.input.siltother,
                  chlorine1: this.input.chlorine1,
                  chlorine2: this.input.chlorine2,
                  chlorinedo1: this.input.chlorinedo1,
                  chlorinedo2: this.input.chlorinedo2,
                  chlorinetemp1: this.input.chlorinetemp1,
                  chlorinetemp2: this.input.chlorinetemp2,
                  chlorinev301: this.input.chlorinev301,
                  chlorinev302: this.input.chlorinev302,
                  chlorinechlorine1: this.input.chlorinechlorine1,
                  chlorinechlorine2: this.input.chlorinechlorine2,
                  chlorineother: this.input.chlorineother,
                  others: this.input.others,
                  woker: this.input.woker,
                },
              })
              .then((response) => {
                this.input.ok = response.data;
                if (this.input.ok[0].message == 'แก้ไขข้อมูลสำเร็จ') {
                  // this.$message.success(
                  //   'สำเร็จ: ' + this.input.ok[0].message,
                  //   5000
                  // );
                  swal({
                    title: 'แจ้งเตือน!',
                    text: this.input.ok[0].message,
                    icon: 'success',
                    button: 'ปิด',
                  });
                } else {
                  // this.$message.error('เตือน: ' + this.input.ok[0].message, 5000);
                  swal({
                    title: 'แจ้งเตือน!',
                    text: this.input.ok[0].message,
                    icon: 'error',
                    button: 'ปิด',
                  });
                }
                this.$router.push('/');
              });
          }
        });
      } else {
        swal({
          title: 'แจ้งเตือน!',
          text: 'หน้านี้สำหรับเจ้าหน้าที่ผู้ปฏบัติงาน',
          icon: 'error',
          button: 'ปิด',
        });
      }
    },
    getpump(num) {
      axios

        .get(`${apiPath.getBaseUrl()}quality_water_detail.php`, {
          params: {num: num},
        })
        .then((response) => {
          this.input.pump_detail = response.data;
          this.getpump_detail(this.input.pump_detail);
        });
    },
    //เอาค่าจาก database มาใส่ใน form
    getpump_detail() {
      this.input.num = this.input.pump_detail[0].num;
      this.input.dateservice = this.input.pump_detail[0].dateservice_format;
      this.input.pumpadjuct1 = this.input.pump_detail[0].pumpadjuct1;
      this.input.pumpadjuct2 = this.input.pump_detail[0].pumpadjuct2;
      this.input.pumpadjuctdo1 = this.input.pump_detail[0].pumpadjuctdo1;
      this.input.pumpadjuctdo2 = this.input.pump_detail[0].pumpadjuctdo2;
      this.input.pumpadjucttemp1 = this.input.pump_detail[0].pumpadjucttemp1;
      this.input.pumpadjucttemp2 = this.input.pump_detail[0].pumpadjucttemp2;
      this.input.pumpadjuctv301 = this.input.pump_detail[0].pumpadjuctv301;
      this.input.pumpadjuctv302 = this.input.pump_detail[0].pumpadjuctv302;
      this.input.pumpadjuctchlorine1 = this.input.pump_detail[0].pumpadjuctchlorine1;
      this.input.pumpadjuctchlorine2 = this.input.pump_detail[0].pumpadjuctchlorine2;
      this.input.pumpadjuctother = this.input.pump_detail[0].pumpadjuctother;
      this.input.aeration1 = this.input.pump_detail[0].aeration1;
      this.input.aeration2 = this.input.pump_detail[0].aeration2;
      this.input.aerationdo1 = this.input.pump_detail[0].aerationdo1;
      this.input.aerationdo2 = this.input.pump_detail[0].aerationdo2;
      this.input.aerationtemp1 = this.input.pump_detail[0].aerationtemp1;
      this.input.aerationtemp2 = this.input.pump_detail[0].aerationtemp2;
      this.input.aerationtv301 = this.input.pump_detail[0].aerationtv301;
      this.input.aerationtv302 = this.input.pump_detail[0].aerationtv302;
      this.input.aerationchlorine1 = this.input.pump_detail[0].aerationchlorine1;
      this.input.aerationchlorine2 = this.input.pump_detail[0].aerationchlorine2;
      this.input.aerationother = this.input.pump_detail[0].aerationother;
      this.input.silt1 = this.input.pump_detail[0].silt1;
      this.input.silt2 = this.input.pump_detail[0].silt2;
      this.input.siltdo1 = this.input.pump_detail[0].siltdo1;
      this.input.siltdo2 = this.input.pump_detail[0].siltdo2;
      this.input.silttemp1 = this.input.pump_detail[0].silttemp1;
      this.input.silttemp2 = this.input.pump_detail[0].silttemp2;
      this.input.siltv301 = this.input.pump_detail[0].siltv301;
      this.input.siltv302 = this.input.pump_detail[0].siltv302;
      this.input.siltchlorine1 = this.input.pump_detail[0].siltchlorine1;
      this.input.siltchlorine2 = this.input.pump_detail[0].siltchlorine2;
      this.input.siltother = this.input.pump_detail[0].siltother;
      this.input.chlorine1 = this.input.pump_detail[0].chlorine1;
      this.input.chlorine2 = this.input.pump_detail[0].chlorine2;
      this.input.chlorinedo1 = this.input.pump_detail[0].chlorinedo1;
      this.input.chlorinedo2 = this.input.pump_detail[0].chlorinedo2;
      this.input.chlorinetemp1 = this.input.pump_detail[0].chlorinetemp1;
      this.input.chlorinetemp2 = this.input.pump_detail[0].chlorinetemp2;
      this.input.chlorinev301 = this.input.pump_detail[0].chlorinev301;
      this.input.chlorinev302 = this.input.pump_detail[0].chlorinev302;
      this.input.chlorinechlorine1 = this.input.pump_detail[0].chlorinechlorine1;
      this.input.chlorinechlorine2 = this.input.pump_detail[0].chlorinechlorine2;
      this.input.chlorineother = this.input.pump_detail[0].chlorineother;
      this.input.others = this.input.pump_detail[0].others;
      this.input.woker = this.input.pump_detail[0].woker;
    },
    clear() {
      swal({
        title: 'แจ้งเตือนลบข้อมูล',
        text: 'ท่านแน่ใจว่าจะลบข้อมูล',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          this.removeperson();
          swal('ลบข้อมูลสำเร็จ!', {
            icon: 'success',
            button: 'ปิด',
          });
          this.$router.push('/');
        } else {
          swal({
            text: 'ยกเลิกการลบข้อมูล!',
            icon: 'info',
            button: 'ปิด',
          });
        }
      });
    },
    //ยืนยันการลบ
    removeperson() {
      axios
        .get(`${apiPath.getBaseUrl()}remove_water.php`, {
          params: {
            num: this.input.num,
          },
        })
        .then((response) => {
          this.romove_message = response.data;
        });
    },
  },
  mounted() {
    window.scrollTo(0, 0);
    this.getpump(this.num);
    this.form.token = JSON.parse(localStorage.getItem('token'));
    this.form.user = this.form.token[0].fullname;
    this.form.level = this.form.token[0].level;
  },
};
</script>
<style scoped>
.demo-col {
  padding: 10px 0;
  text-align: center;
  margin-bottom: 5px;
}
.demo-col2 {
  background: MEDIUMAQUAMARINE;
}
.demo-col3 {
  background: orange;
}
.demo-col4 {
  background: navy;
}
.head {
  font-family: 'Sriracha';
  text-shadow: 4px 4px 4px #aaa;
}
.headsmall {
  font-family: 'Sriracha';
  text-shadow: 2px 2px 2px #aaa;
}
.left {
  text-align: left;
}
.idcolor {
  color: orange;
}
</style>
