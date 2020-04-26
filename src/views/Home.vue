<template>
  <div class="home">
    <fish-row>
      <fish-col span="24">
        <fish-card fluid color="teal">
          <div slot="header">
            <h3 class="head">
              <vue-fontawesome icon="copy" size="2"></vue-fontawesome
              >รายการตรวจเช็คบำรุงรักษาเครื่องปั้ม / เครื่องจักรบ่อบำบัดน้ำเสีย
            </h3>
          </div>
          <datatable title="" :columns="tableColumns1" :rows="tableRows1" />
          <datatable
            title="ตารางตรวจเช็คบำรุงรักษา"
            :columns="loadpumphead"
            :rows="tableloadpump"
          >
            <!-- @row-click="onRowClick"
        > -->

            <th slot="thead-tr">
              รายละเอียด
            </th>
            <template slot="tbody-tr" scope="props">
              <td>
                <button
                  class="btn red darken-2 waves-effect waves-light compact-btn"
                  @click="e => onRowClick(props.row, e)"
                >
                  <i class="material-icons white-text">add_to_queue</i>
                </button>
              </td>
            </template>
          </datatable>
        </fish-card>
      </fish-col>
    </fish-row>

    <fish-row>
      <fish-col span="24">
        <fish-modal
          title="ใบตรวจเช็คบำรุงรักษา"
          :visible.sync="showModal"
          attached="right"
        >
          <fish-card color="orange" fluid>
            <div slot="header">
              <i class="material-icons white-text">library_books</i
              ><strong>รายละเอียด</strong>
            </div>
            <fish-form inline>
              <fish-field label=" ลำดับใบตรวจเช็ค:" inline>
                <h4>{{ tableloadpump_detail[0].num }}</h4>
              </fish-field>
              <fish-field label=" ช่วงเดือนบำรุงรักษา:" inline>
                <h4>{{ tableloadpump_detail[0].month }} เดือน</h4>
              </fish-field>
              <fish-field label=" สถานที่:" inline>
                <h4>{{ tableloadpump_detail[0].place }}</h4>
              </fish-field>
              <fish-field label=" ยี่ห้อ:" inline>
                <h4>{{ tableloadpump_detail[0].p_pump_brand }}</h4>
              </fish-field>
              <fish-field label=" ON:" inline>
                <h4>{{ tableloadpump_detail[0].on_number }}</h4>
              </fish-field>
              <fish-field label=" หมายเลขเครื่อง / รุ่น:" inline>
                <h4>{{ tableloadpump_detail[0].p_pump }}</h4>
              </fish-field>
              <fish-field label=" ID:" inline>
                <h4>{{ tableloadpump_detail[0].id }}</h4>
              </fish-field>
              <fish-field label=" จุดติดตั้ง:" inline>
                <h4>{{ tableloadpump_detail[0].install_point_name }}</h4>
              </fish-field>
              <fish-field label=" วันที่ตรวจเช็ค:" inline>
                <h4>{{ tableloadpump_detail[0].dateservice }}</h4>
              </fish-field>
            </fish-form>
          </fish-card>
          <fish-divider />
          <fish-card color="orange" fluid>
            <div slot="header">
              <i class="material-icons white-text">web</i
              ><strong>รายการตรวจเช็ค</strong>
            </div>
            <fish-row>
              <fish-col span="6" class="demo-col"><h4>รายการ</h4></fish-col>
              <fish-col span="6" class="demo-col"
                ><h4>แนวทางการตรวจเช็ค</h4></fish-col
              >
              <fish-col span="6" class="demo-col"><h4>สถานะ</h4></fish-col>
              <fish-col span="6" class="demo-col"><h4>หมายเหตุ</h4></fish-col>
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
              <fish-button type="basic" @click="pumpedit">
                <vue-fontawesome icon="edit" size="2"></vue-fontawesome>
                ตรวจสอบ-แก้ไข</fish-button
              >
            </fish-col>
          </fish-row>
        </fish-modal>
        <!-- <fish-button @click="Line()">ทดสอบ</fish-button>
        <pre>{{ okmessage }}</pre> -->
      </fish-col>
    </fish-row>
  </div>
</template>

<script>
import DataTable from "vue-materialize-datatable";
import axios from "axios";
import { APIPath } from "../../service/APIPath";
const apiPath = new APIPath();

import Wire from "@/components/Wire.vue";
import Service from "@/components/Service.vue";
import Seal from "@/components/Seal.vue";
import Condition from "@/components/Condition.vue";
import Propeller from "@/components/Propeller.vue";
import Snail from "@/components/Snail.vue";
import Oil from "@/components/Oil.vue";
import Jarabi from "@/components/Jarabi.vue";
import Clean from "@/components/Clean.vue";
import Arm from "@/components/Arm.vue";
import System from "@/components/System.vue";
import Sump from "@/components/Sump.vue";
import Chlorine from "@/components/Chlorine.vue";

export default {
  name: "Home",
  components: {
    datatable: DataTable,
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
    Chlorine
  },
  data() {
    return {
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
      loadpumphead: [
        {
          label: "เลขที่ใบตรวจเช็ค",
          field: "num",
          numeric: false,
          html: false
        },
        {
          label: "ช่วงเดือนบำรุงรักษา",
          field: "month",
          numeric: false,
          html: false
        },
        // {
        //   label: 'สถานที่',
        //   field: 'place',
        //   numeric: false,
        //   html: false,
        // },
        {
          label: "ยี่ห้อ",
          field: "p_pump_brand",
          numeric: false,
          html: false
        },
        {
          label: "ON",
          field: "on_number",
          numeric: false,
          html: false
        },
        {
          label: "หมายเลขเครื่อง / รุ่น",
          field: "p_pump",
          numeric: false,
          html: false
        },
        {
          label: "ID",
          field: "id",
          numeric: false,
          html: false
        },
        {
          label: "จุดติดตั้ง",
          field: "install_point_name",
          numeric: false,
          html: false
        },
        {
          label: "วันที่ตรวจเช็ค",
          field: "dateservice",
          numeric: false,
          html: false
        },
        {
          label: "หัวหน้าประปา ",
          field: "boss_approve",
          numeric: false,
          html: false
        },
        {
          label: "ผู้ตรวจสอบ",
          field: "inspector_approve",
          numeric: false,
          html: false
        },
        {
          label: "รองผู้อำนวยการฝ่ายบริหาร",
          field: "manage_approve",
          numeric: false,
          html: false
        }
      ],
      tableloadpump: [],
      tableloadpump_detail: "0",
      wire_detail: "0",
      okmessage: "1",
      idsend: ""
    };
  },

  methods: {
    // Line() {
    //   axios.post(`${apiPath.getBaseUrl()}line.php`).then((response) => {
    //     this.okmessage = response.data;
    //     alert(this.okmessage[0].message);
    //   });
    // },

    loadpump() {
      axios.get(`${apiPath.getBaseUrl()}visit_data.php`).then(response => {
        this.tableloadpump = response.data;
        // //ส่ง object ไปให้ compunent
        // this.tableloadpump_detail = this.tableloadpump_detail;

        this.pumpchange();
      });
    },
    //คลิกที่แถว
    onRowClick: function(row) {
      // alert(row.num);
      console.log(row.num);
      this.showModal = true;
      //ดูรายละเอียดใบเช็ค
      this.getpump(row.num);
      this.idsend = row.num;
    },
    //ดูรายละเอียดใบเช็ค
    getpump(num) {
      axios

        .get(`${apiPath.getBaseUrl()}visit_data_detail.php`, {
          params: { num: num }
        })
        .then(response => {
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
        this.tableloadpump_detail[0].p_pump_id == "1" &&
        this.tableloadpump_detail[0].month == "3"
      ) {
        this.p2_show = false;
        this.p8_show = false;
        this.p10_show = false;
        this.p13_show = false;
      } else if (
        this.tableloadpump_detail[0].p_pump_id == "2" &&
        this.tableloadpump_detail[0].month == "3"
      ) {
        this.p2_show = false;
        this.p5_show = false;
        this.p6_show = false;
        this.p8_show = false;
        this.p10_show = false;
        this.p13_show = false;
      } else if (
        this.tableloadpump_detail[0].p_pump_id == "3" &&
        this.tableloadpump_detail[0].month == "3"
      ) {
        this.p2_show = false;
        this.p8_show = false;
        this.p10_show = false;
        this.p13_show = false;
      } else if (
        this.tableloadpump_detail[0].p_pump_id == "4" &&
        this.tableloadpump_detail[0].month == "3"
      ) {
        this.p2_show = false;
        this.p5_show = false;
        this.p6_show = false;
        this.p8_show = false;
        this.p10_show = false;
        this.p13_show = false;
      } else if (
        this.tableloadpump_detail[0].p_pump_id == "5" &&
        this.tableloadpump_detail[0].month == "3"
      ) {
        this.p2_show = false;
        this.p5_show = false;
        this.p6_show = false;
        this.p7_show = false;
        this.p8_show = false;
        this.p10_show = false;
        this.p12_show = false;
      } else if (
        this.tableloadpump_detail[0].p_pump_id == "6" &&
        this.tableloadpump_detail[0].month == "3"
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
        this.tableloadpump_detail[0].p_pump_id == "7" &&
        this.tableloadpump_detail[0].month == "3"
      ) {
        this.p2_show = false;
        this.p10_show = false;
        this.p13_show = false;
      } else if (
        this.tableloadpump_detail[0].p_pump_id == "8" &&
        this.tableloadpump_detail[0].month == "3"
      ) {
        this.p2_show = false;
        this.p3_show = false;
        this.p5_show = false;
        this.p6_show = false;
        this.p13_show = false;
      } else if (
        this.tableloadpump_detail[0].p_pump_id == "9" &&
        this.tableloadpump_detail[0].month == "3"
      ) {
        this.p2_show = false;
        this.p3_show = false;
        this.p5_show = false;
        this.p6_show = false;
        this.p7_show = false;
        this.p10_show = false;
        this.p13_show = false;
      } else if (
        this.tableloadpump_detail[0].p_pump_id == "1" &&
        this.tableloadpump_detail[0].month == "1"
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
        this.tableloadpump_detail[0].p_pump_id == "2" &&
        this.tableloadpump_detail[0].month == "1"
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
        this.tableloadpump_detail[0].p_pump_id == "3" &&
        this.tableloadpump_detail[0].month == "1"
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
        this.tableloadpump_detail[0].p_pump_id == "4" &&
        this.tableloadpump_detail[0].month == "1"
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
        this.tableloadpump_detail[0].p_pump_id == "5" &&
        this.tableloadpump_detail[0].month == "1"
      ) {
        this.p2_show = false;
        this.p5_show = false;
        this.p6_show = false;
        this.p7_show = false;
        this.p8_show = false;
        this.p10_show = false;
        this.p12_show = false;
      } else if (
        this.tableloadpump_detail[0].p_pump_id == "6" &&
        this.tableloadpump_detail[0].month == "1"
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
        this.tableloadpump_detail[0].p_pump_id == "7" &&
        this.tableloadpump_detail[0].month == "1"
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
        this.tableloadpump_detail[0].p_pump_id == "8" &&
        this.tableloadpump_detail[0].month == "1"
      ) {
        this.p2_show = false;
        this.p3_show = false;
        this.p5_show = false;
        this.p6_show = false;
        this.p13_show = false;
      } else if (
        this.tableloadpump_detail[0].p_pump_id == "9" &&
        this.tableloadpump_detail[0].month == "1"
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
      this.$router.push("/edit/" + this.idsend);
    }
  },
  mounted() {
    this.loadpump();
  }
};
</script>
