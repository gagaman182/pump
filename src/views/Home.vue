<template>
  <div class="home">
    <fish-row>
      <fish-col span="24">
        <fish-card fluid color="teal">
          <div slot="header">
            <h2>
              <i class="material-icons white-text">build</i
              >รายการตรวจเช็คบำรุงรักษาเครื่องปั้ม / เครื่องจักรบ่อบำบัดน้ำเสีย
            </h2>
          </div>

          <div>
            <h2 class="head">
              <i class="material-icons white-text">calendar_today</i
              >ตารางใบตรวจเช็คบำรุงรักษา
            </h2>
          </div>
          <fish-divider></fish-divider>
          <vue-good-table
            ref="formref"
            :columns="form_column"
            :rows="form_data"
            :search-options="{enabled: true}"
            :pagination-options="{enabled: true}"
            :totalRows="totalRecords"
            styleClass="vgt-table  striped"
            :line-numbers="true"
            :row-style-class="rowStyleClassFn"
            @on-row-click="formbtn"
          >
            <template slot="table-row" slot-scope="props">
              <span v-if="props.column.field == 'boss_approve'">
                <span style="font-weight: bold; color: green;">{{
                  props.row.boss_approve
                }}</span>
              </span>
              <span v-else-if="props.column.field == 'inspector_approve'">
                <span style="font-weight: bold; color: green;">{{
                  props.row.inspector_approve
                }}</span>
              </span>
              <span v-else-if="props.column.field == 'manage_approve'">
                <span style="font-weight: bold; color: green;">{{
                  props.row.manage_approve
                }}</span>
              </span>
              <span v-else>
                {{ props.formattedRow[props.column.field] }}
              </span>
            </template>
          </vue-good-table>
          <fish-divider></fish-divider>
          <!-- //ตาราง day form -->

          <fish-row gutter=".6">
            <fish-col span="12"
              ><div class="demo-col">
                <div>
                  <h2 class="head">
                    <i class="material-icons white-text">store</i
                    >ตารางใบตรวจเช็คบำรุงรักษา
                  </h2>
                </div>
                <fish-divider></fish-divider>
                <vue-good-table
                  ref="formref"
                  :columns="pday_column"
                  :rows="pday_data"
                  :search-options="{enabled: true}"
                  :pagination-options="{enabled: true}"
                  :totalRows="totalRecords"
                  styleClass="vgt-table  "
                  :line-numbers="true"
                  :row-style-class="rowStyleClassFn"
                  @on-row-click="pdaybtn"
                >
                </vue-good-table></div
            ></fish-col>
            <fish-col span="12"
              ><div class="demo-col demo-col2">
                <div>
                  <h2 class="head">
                    <i class="material-icons white-text">waves</i
                    >แบบวัดคุณภาพน้ำ
                  </h2>
                </div>
              </div>
              <fish-divider></fish-divider>
              <vue-good-table
                ref="formref"
                :columns="quality_water_column"
                :rows="quality_water_data"
                :search-options="{enabled: true}"
                :pagination-options="{enabled: true}"
                :totalRows="totalRecords"
                styleClass="vgt-table  "
                :line-numbers="true"
                :row-style-class="rowStyleClassFn"
                @on-row-click="qualitywaterbtn"
              >
              </vue-good-table>
            </fish-col>
          </fish-row>

          <!-- <pre>{{ pday_data }}</pre>
          <pre>{{ this.dd }}</pre> -->
        </fish-card>
      </fish-col>
    </fish-row>

    <fish-row>
      <fish-col span="24">
        <!-- <fish-button @click="Line()">ทดสอบ</fish-button>
        <pre>{{ okmessage }}</pre> -->
        <vue-modaltor
          :visible="open"
          @hide="hideModal"
          :animation-parent="'modal-scale'"
          :default-width="'60%'"
        >
          <fish-card color="orange" fluid>
            <div slot="header">
              <h3>
                <i class="material-icons white-text">library_books</i>
                รายละเอียด
              </h3>
            </div>
            <fish-form inline>
              <fish-field label=" ลำดับใบตรวจเช็ค:" inline>
                <h3>{{ tableloadpump_detail[0].num }}</h3>
              </fish-field>
              <fish-field label=" ช่วงเดือนบำรุงรักษา:" inline>
                <h3>{{ tableloadpump_detail[0].month }} เดือน</h3>
              </fish-field>
              <fish-field label=" สถานที่:" inline>
                <h3>{{ tableloadpump_detail[0].place }}</h3>
              </fish-field>
              <fish-field label=" ยี่ห้อ:" inline>
                <h3>{{ tableloadpump_detail[0].p_pump_brand }}</h3>
              </fish-field>
              <fish-field label=" ON:" inline>
                <h3>{{ tableloadpump_detail[0].on_number }}</h3>
              </fish-field>
              <fish-field label=" หมายเลขเครื่อง / รุ่น:" inline>
                <h3>{{ tableloadpump_detail[0].p_pump }}</h3>
              </fish-field>
              <fish-field label=" ID:" inline>
                <h3>{{ tableloadpump_detail[0].id }}</h3>
              </fish-field>
              <fish-field label=" จุดติดตั้ง:" inline>
                <h3>{{ tableloadpump_detail[0].install_point_name }}</h3>
              </fish-field>
              <fish-field label=" วันที่ตรวจเช็ค:" inline>
                <h3>{{ tableloadpump_detail[0].dateservice }}</h3>
              </fish-field>
            </fish-form>
          </fish-card>

          <fish-card color="orange" fluid>
            <div slot="header">
              <h3>
                <i class="material-icons white-text">web</i>รายการตรวจเช็ค
              </h3>
            </div>
            <!-- ผู้ตรวจสอบแล้ว -->
            <Approve :pumpall="tableloadpump_detail" v-show="p1_show" />
            <fish-row>
              <fish-col span="6" class="demo-col"><h3>รายการ</h3></fish-col>
              <fish-col span="6" class="demo-col"
                ><h3>แนวทางการตรวจเช็ค</h3></fish-col
              >
              <fish-col span="6" class="demo-col"><h3>สถานะ</h3></fish-col>
              <fish-col span="6" class="demo-col"><h3>หมายเหตุ</h3></fish-col>
            </fish-row>
            <fish-divider fitted></fish-divider>
            <!-- 1 ชุดสายไฟเครื่องปั้ม  -->
            <Wire :pumpall="tableloadpump_detail" v-show="p1_show" />

            <!-- 2 ตรวจสอบการ ทำงานของเครื่อง  -->
            <Service :pumpall="tableloadpump_detail" v-show="p2_show" />

            <!-- 3 ซีลเครื่องปั้ม -->
            <Seal :pumpall="tableloadpump_detail" v-show="p3_show" />

            <!-- 4 สภาพโดยรวมของเครื่อง -->
            <Condition :pumpall="tableloadpump_detail" v-show="p4_show" />

            <!-- 5 ชุดใบพัดปั้ม -->
            <Propeller :pumpall="tableloadpump_detail" v-show="p5_show" />

            <!-- 6 หอยโข่งปั้ม -->
            <Snail :pumpall="tableloadpump_detail" v-show="p6_show" />

            <!-- 7 ระดับน้ำมันเครื่อง -->
            <Oil :pumpall="tableloadpump_detail" v-show="p7_show" />

            <!-- 8 อัดจาระบี -->
            <Jarabi :pumpall="tableloadpump_detail" v-show="p8_show" />

            <!-- 9 ทำความสะอาด -->
            <Clean :pumpall="tableloadpump_detail" v-show="p9_show" />

            <!-- 10 ชุดแขนของเครื่อง กวาดตะกอน -->
            <Arm :pumpall="tableloadpump_detail" v-show="p10_show" />

            <!-- 11  ตรวจเช็คระบบ ควบคุมปั้ม -->
            <System :pumpall="tableloadpump_detail" v-show="p11_show" />

            <!-- 12  ตรวจเช็คระบบ ควบคุมปั้ม -->
            <Sump :pumpall="tableloadpump_detail" v-show="p12_show" />

            <!-- 13    ตรวจเช็คถังคลอรีน จุดต่อสาย -->
            <Chlorine :pumpall="tableloadpump_detail" v-show="p13_show" />
          </fish-card>
          <br />
          <fish-row>
            <fish-col span="2">
              <fish-button type="primary" @click="pumpedit">
                <vue-fontawesome icon="edit" size="2"></vue-fontawesome>
                ตรวจสอบ-แก้ไข</fish-button
              >
            </fish-col>
            <fish-col span="12">
              <code-card
                title="Loading"
                desc="A segment may show its content is being loaded"
              >
                <template slot="demo">
                  <fish-segment loading style="height: 100px;"
                    >Loading</fish-segment
                  >
                </template>
                <template slot="codeHtml">
                  <pre v-highlightjs><code class="xml"></code></pre>
                </template>
              </code-card>
            </fish-col>
          </fish-row>
        </vue-modaltor>
      </fish-col>
    </fish-row>
  </div>
</template>

<script>
import axios from 'axios';
import {APIPath} from '../../service/APIPath';
const apiPath = new APIPath();

import Wire from '@/components/Wire.vue';
import Service from '@/components/Service.vue';
import Seal from '@/components/Seal.vue';
import Condition from '@/components/Condition.vue';
import Propeller from '@/components/Propeller.vue';
import Snail from '@/components/Snail.vue';
import Oil from '@/components/Oil.vue';
import Jarabi from '@/components/Jarabi.vue';
import Clean from '@/components/Clean.vue';
import Arm from '@/components/Arm.vue';
import System from '@/components/System.vue';
import Sump from '@/components/Sump.vue';
import Chlorine from '@/components/Chlorine.vue';
import Approve from '@/components/Approve.vue';

export default {
  name: 'Home',
  components: {
    Wire,
    Service,
    Seal,
    Condition,
    Propeller,
    Snail,
    Oil,
    Jarabi,
    Clean,
    Arm,
    System,
    Sump,
    Chlorine,
    Approve,
  },
  data() {
    return {
      open: false,
      p1_show: true,
      p2_show: true,
      p3_show: true,
      p4_show: true,
      p5_show: true,
      p6_show: true,
      p7_show: true,
      p8_show: true,
      p9_show: true,
      p10_show: true,
      p11_show: true,
      p12_show: true,

      showModal: false,

      tableloadpump: [],

      tableloadpump_detail: '0',
      wire_detail: '0',
      okmessage: '1',
      idsend: '',
      idsendpday: '',
      idsendwater: '',
      form_column: [
        {
          label: 'เลขที่ใบตรวจเช็ค',
          field: 'num',
        },
        {
          label: 'ช่วงเดือน',
          field: 'month',
        },
        {
          label: 'ยี่ห้อ',
          field: 'p_pump_brand',
        },
        {
          label: 'ON',
          field: 'on_number',
        },
        {
          label: 'หมายเลขเครื่อง/รุ่น',
          field: 'p_pump',
        },
        {
          label: 'ID',
          field: 'id',
        },
        {
          label: 'จุดติดตั้ง',
          field: 'install_point_name',
        },
        {
          label: 'วันที่ตรวจเช็ค',
          field: 'dateservice',
        },
        {
          label: 'หัวหน้าประปา',
          field: 'boss_approve',
        },
        {
          label: 'ผู้ตรวจสอบ',
          field: 'inspector_approve',
        },
        {
          label: 'รองผู้อำนวยการฝ่ายบริหาร',
          field: 'manage_approve',
        },
      ],
      form_data: '',
      pday_column: [
        {
          label: 'เลขที่ใบตรวจสอบ',
          field: 'num',
        },
        {
          label: 'วันที่ตรวจสอบและบำรุงรักษา',
          field: 'dateservice',
        },
      ],
      pday_data: '',
      quality_water_column: [
        {
          label: 'เลขที่ใบตรวจสอบ',
          field: 'num',
        },
        {
          label: 'วันที่วัดคุณภาพน้ำ',
          field: 'dateservice',
        },
      ],
      quality_water_data: '',
      dd: '',
    };
  },

  methods: {
    // Line() {
    //   axios.post(`${apiPath.getBaseUrl()}line.php`).then((response) => {
    //     this.okmessage = response.data;
    //     alert(this.okmessage[0].message);
    //   });
    // },

    //คลิกที่แถว
    onRowClick: function(row) {
      // alert(row.num);
      console.log(row.num);
      // this.showModal = true;
      this.open = true;

      //ดูรายละเอียดใบเช็ค
      this.getpump(row.num);
      this.idsend = row.num;
    },
    //ดูรายละเอียดใบเช็ค
    getpump(num) {
      axios

        .get(`${apiPath.getBaseUrl()}visit_data_detail.php`, {
          params: {num: num},
        })
        .then((response) => {
          this.tableloadpump_detail = response.data;
          // //ส่งเลขไปให้ compunent
          // this.tableloadpump_detail = this.tableloadpump_detail;
          this.showall();
          this.pumpchange();
        });
    },
    showall() {
      this.p1_show = true;
      this.p2_show = true;
      this.p3_show = true;
      this.p4_show = true;
      this.p5_show = true;
      this.p6_show = true;
      this.p7_show = true;
      this.p8_show = true;
      this.p9_show = true;
      this.p10_show = true;
      this.p11_show = true;
      this.p12_show = true;
      this.p13_show = true;
    },
    pumpchange() {
      if (
        this.tableloadpump_detail[0].p_pump_id == '1' &&
        this.tableloadpump_detail[0].month == '3'
      ) {
        this.p2_show = false;
        this.p8_show = false;
        this.p10_show = false;
        this.p13_show = false;
      } else if (
        this.tableloadpump_detail[0].p_pump_id == '2' &&
        this.tableloadpump_detail[0].month == '3'
      ) {
        this.p2_show = false;
        this.p5_show = false;
        this.p6_show = false;
        this.p8_show = false;
        this.p10_show = false;
        this.p13_show = false;
      } else if (
        this.tableloadpump_detail[0].p_pump_id == '3' &&
        this.tableloadpump_detail[0].month == '3'
      ) {
        this.p2_show = false;
        this.p8_show = false;
        this.p10_show = false;
        this.p13_show = false;
      } else if (
        this.tableloadpump_detail[0].p_pump_id == '4' &&
        this.tableloadpump_detail[0].month == '3'
      ) {
        this.p2_show = false;
        this.p5_show = false;
        this.p6_show = false;
        this.p8_show = false;
        this.p10_show = false;
        this.p13_show = false;
      } else if (
        this.tableloadpump_detail[0].p_pump_id == '5' &&
        this.tableloadpump_detail[0].month == '3'
      ) {
        this.p2_show = false;
        this.p5_show = false;
        this.p6_show = false;
        this.p7_show = false;
        this.p8_show = false;
        this.p10_show = false;
        this.p12_show = false;
      } else if (
        this.tableloadpump_detail[0].p_pump_id == '6' &&
        this.tableloadpump_detail[0].month == '3'
      ) {
        this.p2_show = false;
        this.p5_show = false;
        this.p6_show = false;
        this.p7_show = false;
        this.p8_show = false;
        this.p10_show = false;
        this.p11_show = false;
        this.p12_show = false;
      } else if (
        this.tableloadpump_detail[0].p_pump_id == '7' &&
        this.tableloadpump_detail[0].month == '3'
      ) {
        this.p2_show = false;
        this.p10_show = false;
        this.p13_show = false;
      } else if (
        this.tableloadpump_detail[0].p_pump_id == '8' &&
        this.tableloadpump_detail[0].month == '3'
      ) {
        this.p2_show = false;
        this.p3_show = false;
        this.p5_show = false;
        this.p6_show = false;
        this.p13_show = false;
      } else if (
        this.tableloadpump_detail[0].p_pump_id == '9' &&
        this.tableloadpump_detail[0].month == '3'
      ) {
        this.p2_show = false;
        this.p3_show = false;
        this.p5_show = false;
        this.p6_show = false;
        this.p7_show = false;
        this.p10_show = false;
        this.p13_show = false;
      } else if (
        this.tableloadpump_detail[0].p_pump_id == '1' &&
        this.tableloadpump_detail[0].month == '1'
      ) {
        this.p3_show = false;
        this.p4_show = false;
        this.p5_show = false;
        this.p6_show = false;
        this.p7_show = false;
        this.p8_show = false;
        this.p9_show = false;
        this.p10_show = false;
        this.p13_show = false;
      } else if (
        this.tableloadpump_detail[0].p_pump_id == '2' &&
        this.tableloadpump_detail[0].month == '1'
      ) {
        this.p3_show = false;
        this.p4_show = false;
        this.p5_show = false;
        this.p6_show = false;
        this.p7_show = false;
        this.p8_show = false;
        this.p9_show = false;
        this.p10_show = false;
        this.p13_show = false;
      } else if (
        this.tableloadpump_detail[0].p_pump_id == '3' &&
        this.tableloadpump_detail[0].month == '1'
      ) {
        this.p3_show = false;
        this.p4_show = false;
        this.p5_show = false;
        this.p6_show = false;
        this.p7_show = false;
        this.p8_show = false;
        this.p9_show = false;
        this.p10_show = false;
        this.p13_show = false;
      } else if (
        this.tableloadpump_detail[0].p_pump_id == '4' &&
        this.tableloadpump_detail[0].month == '1'
      ) {
        this.p3_show = false;
        this.p4_show = false;
        this.p5_show = false;
        this.p6_show = false;
        this.p7_show = false;
        this.p8_show = false;
        this.p9_show = false;
        this.p10_show = false;
        this.p13_show = false;
      } else if (
        this.tableloadpump_detail[0].p_pump_id == '5' &&
        this.tableloadpump_detail[0].month == '1'
      ) {
        this.p2_show = false;
        this.p5_show = false;
        this.p6_show = false;
        this.p7_show = false;
        this.p8_show = false;
        this.p10_show = false;
        this.p12_show = false;
      } else if (
        this.tableloadpump_detail[0].p_pump_id == '6' &&
        this.tableloadpump_detail[0].month == '1'
      ) {
        this.p2_show = false;
        this.p5_show = false;
        this.p6_show = false;
        this.p7_show = false;
        this.p8_show = false;
        this.p10_show = false;
        this.p11_show = false;
        this.p12_show = false;
      } else if (
        this.tableloadpump_detail[0].p_pump_id == '7' &&
        this.tableloadpump_detail[0].month == '1'
      ) {
        this.p3_show = false;
        this.p4_show = false;
        this.p5_show = false;
        this.p6_show = false;
        this.p7_show = false;
        this.p8_show = false;
        this.p9_show = false;
        this.p10_show = false;
        this.p13_show = false;
      } else if (
        this.tableloadpump_detail[0].p_pump_id == '8' &&
        this.tableloadpump_detail[0].month == '1'
      ) {
        this.p2_show = false;
        this.p3_show = false;
        this.p5_show = false;
        this.p6_show = false;
        this.p13_show = false;
      } else if (
        this.tableloadpump_detail[0].p_pump_id == '9' &&
        this.tableloadpump_detail[0].month == '1'
      ) {
        this.p2_show = false;
        this.p3_show = false;
        this.p5_show = false;
        this.p6_show = false;
        this.p7_show = false;
        this.p10_show = false;
        this.p13_show = false;
      } else {
        this.p1_show = true;
        this.p2_show = true;
        this.p3_show = true;
        this.p4_show = true;
        this.p5_show = true;
        this.p6_show = true;
        this.p7_show = true;
        this.p8_show = true;
        this.p9_show = true;
        this.p10_show = true;
        this.p11_show = true;
        this.p12_show = true;
        this.p13_show = true;
      }
    },
    pumpedit() {
      // alert(this.idsend);
      this.$router.push('/edit/' + this.idsend);
    },
    hideModal() {
      this.open = false;
    },
    loadpump() {
      // show pump
      axios.get(`${apiPath.getBaseUrl()}visit_data.php`).then((response) => {
        this.form_data = response.data;
      });
    },
    loadpday() {
      // show pday
      axios.get(`${apiPath.getBaseUrl()}dayform_data.php`).then((response) => {
        this.pday_data = response.data;
      });
    },
    loadqualitywater() {
      // show pday
      axios
        .get(`${apiPath.getBaseUrl()}quality_water_data.php`)
        .then((response) => {
          this.quality_water_data = response.data;
        });
    },

    formbtn(params) {
      this.open = true;
      this.getpump(params.row.num);
      this.idsend = params.row.num;
    },
    pdaybtn(params) {
      this.idsendpday = params.row.num;

      this.$router.push('/dayform_edit/' + this.idsendpday);
    },
    qualitywaterbtn(params) {
      this.idsendwater = params.row.num;

      this.$router.push('/quality_edit/' + this.idsendwater);
    },
  },

  mounted() {
    this.loadpump();
    this.loadpday();
    this.loadqualitywater();
  },
};
</script>
<style scoped>
.head {
  color: navy;
  font-family: 'Sriracha';
  text-shadow: 4px 4px 4px #aaa;
  font-size: 24px;
}
</style>
