/**
 * Dashboard Analytics
 */




'use strict';
(function () {
  let cardColor, headingColor, legendColor, labelColor, shadeColor, borderColor;

  if (isDarkStyle) {
    cardColor = config.colors_dark.cardColor;
    headingColor = config.colors_dark.headingColor;
    legendColor = config.colors_dark.bodyColor;
    labelColor = config.colors_dark.textMuted;
    borderColor = config.colors_dark.borderColor;
  } else {
    cardColor = config.colors.cardColor;
    headingColor = config.colors.headingColor;
    legendColor = config.colors.bodyColor;
    labelColor = config.colors.textMuted;
    borderColor = config.colors.borderColor;
  }

  // Graphique pour l'evolution des membres
  
  
    const orderAreaChartEl = document.querySelector('#orderChart'),
      orderAreaChartConfig = {
        chart: {
          height: 80,
          type: 'area',
          toolbar: {
            show: false
          },
          sparkline: {
            enabled: true
          }
        },
        markers: {
          size: 6,
          colors: 'transparent',
          strokeColors: 'transparent',
          strokeWidth: 4,
          discrete: [
            {
              fillColor: config.colors.white,
              seriesIndex: 0,
              dataPointIndex: 6,
              strokeColor: config.colors.success,
              strokeWidth: 2,
              size: 6,
              radius: 8
            }
          ],
          hover: {
            size: 7
          }
        },
        grid: {
          show: false,
          padding: {
            right: 8
          }
        },
        colors: [config.colors.success],
        fill: {
          type: 'gradient',
          gradient: {
            shade: shadeColor,
            shadeIntensity: 0.8,
            opacityFrom: 0.8,
            opacityTo: 0.25,
            stops: [0, 85, 100]
          }
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          width: 2,
          curve: 'smooth'
        },
        series: [
          {
            data: [180, 175, 275, 140, 205, 190, 295]
          }
        ],
        xaxis: {
          categories: ['mo','mk','km'],
          show: false,
          lines: {
            show: false
          },
          labels: {
            show: false
          },
          stroke: {
            width: 0
          },
          axisBorder: {
            show: false
          }
        },
        yaxis: {
          stroke: {
            width: 0
          },
          show: false
        }
      };
    if (typeof orderAreaChartEl !== undefined && orderAreaChartEl !== null) {
      const orderAreaChart = new ApexCharts(orderAreaChartEl, orderAreaChartConfig);
      orderAreaChart.render();
    }
  //Fin Graphique pour l'evolution des membres


  // Personnel genre
  $(document).ready(function() {
    $.ajax({
        url: '/Dash/Genre/Stat',
        type: 'GET',
        dataType: 'json',
        success: function(genre) 
        {
          const homme = genre.userH;
          const femme = genre.userF;
          const gsomme = genre.userWS;
          const uhp = genre.uhp;
          const ufp = genre.ufp;
          
          const chartOrderStatistics = document.querySelector('#orderStatisticsChart'),
          orderChartConfig = {
            chart: {
              height: 165,
              width: 130,
              type: 'donut'
            },
            labels: ['Hommes', 'Femmes'],
            series: [homme, femme],
            colors: [config.colors.primary, config.colors.success],
            stroke: {
              width: 5,
              colors: cardColor
            },
            dataLabels: {
              enabled: false,
              formatter: function (val, opt) {
                return parseInt(val) + '%';
              }
            },
            legend: {
              show: false
            },
            grid: {
              padding: {
                top: 0,
                bottom: 0,
                right: 15
              }
            },
            plotOptions: {
              pie: {
                donut: {
                  size: '75%',
                  labels: {
                    show: true,
                    value: {
                      fontSize: '1.5rem',
                      fontFamily: 'Public Sans',
                      color: headingColor,
                      offsetY: -15,
                      formatter: function (val) {
                        return parseInt(val) + '%';
                      }
                    },
                    name: {
                      offsetY: 20,
                      fontFamily: 'Public Sans'
                    },
                    total: {
                      show: true,
                      fontSize: '0.8125rem',
                      color: legendColor,
                      label: 'Total',
                      formatter: function (w) {
                        return '100%';
                      }
                    }
                  }
                }
              }
            }
          };
          if (typeof chartOrderStatistics !== undefined && chartOrderStatistics !== null) {
            const statisticsChart = new ApexCharts(chartOrderStatistics, orderChartConfig);
            statisticsChart.render();
          }
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
  });

  
  // Fin personnel genre

  // Graphique pour l'affectation des tenues
    $(document).ready(function() {
      $.ajax({
          url: '/statistique',
          dataType: 'json',
          success: function(result) {
            function getMois(i){
                if(i == 1)
                  {
                    return "Janvier"
                  }
                if(i == 2)
                  {
                    return "Fevrier"
                  }
                if(i == 3)
                  {
                    return "Mars"
                  }
                if(i == 4)
                  {
                    return "Avril"
                  }
                if(i == 5)
                  {
                    return "Mai"
                  }
                if(i == 6)
                  {
                      return "Juin"
                  }
                if(i == 7)
                  {
                    return "Juillet"
                  }
                if(i == 8)
                  {
                    return "Aout"
                  }
                if(i == 9)
                  {
                    return "Septembre"
                  }
                if(i == 10)
                  {
                    return "Octobre"
                  }
                if(i == 11)
                  {
                    return "Novembre"
                  }
                if(i == 12)
                  {
                    return "Decembre"
                  }

            }
              // Faites ce que vous voulez avec les données récupérées
            console.log(result[0]);
              const totalRevenueChartEl = document.querySelector('#totalRevenueChart');
              const data = [];
              const month = [];
              const years = [];
              // bonjour
              for (var i = 0; i < result.length; i++) {
                data.push(result[i].count);
                month.push(getMois(result[i].mois));
                years.push(result[i].annee);
                }

              const totalRevenueChartOptions = {
                  series: [
                      {
                          name: years,
                          data: data
                      }
                  ],
                  chart: {
                      height: 300,
                      stacked: true,
                      type: 'bar',
                      toolbar: { show: false }
                  },
                  plotOptions: {
                      bar: {
                          horizontal: false,
                          columnWidth: '33%',
                          borderRadius: 12,
                          startingShape: 'rounded',
                          endingShape: 'rounded'
                      }
                  },
                  colors: [config.colors.primary, config.colors.info],
                  dataLabels: {
                      enabled: false
                  },
                  stroke: {
                      curve: 'smooth',
                      width: 6,
                      lineCap: 'round',
                      colors: [cardColor]
                  },
                  legend: {
                      show: true,
                      horizontalAlign: 'left',
                      position: 'top',
                      markers: {
                          height: 8,
                          width: 8,
                          radius: 12,
                          offsetX: -3
                      },
                      labels: {
                          colors: legendColor
                      },
                      itemMargin: {
                          horizontal: 10
                      }
                  },
                  grid: {
                      borderColor: borderColor,
                      padding: {
                          top: 0,
                          bottom: -8,
                          left: 20,
                          right: 20
                      }
                  },
                  xaxis: {
                      categories: month,
                      labels: {
                          style: {
                              fontSize: '13px',
                              colors: labelColor
                          }
                      },
                      axisTicks: {
                          show: false
                      },
                      axisBorder: {
                          show: false
                      }
                  },
                  yaxis: {
                      labels: {
                          style: {
                              fontSize: '13px',
                              colors: labelColor
                          }
                      }
                  },
                  responsive: [
                      // Définition des options responsives
                  ],
                  states: {
                      hover: {
                          filter: {
                              type: 'none'
                          }
                      },
                      active: {
                          filter: {
                              type: 'none'
                          }
                      }
                  }
              };

              if (typeof totalRevenueChartEl !== 'undefined' && totalRevenueChartEl !== null) {
                  const totalRevenueChart = new ApexCharts(totalRevenueChartEl, totalRevenueChartOptions);
                  totalRevenueChart.render();
              }
          },
          error: function(error) {
              console.error(error);
          }
      });
    });
  // Fin Graphique pour l'affectation des tenues


  // Statistique1 === Faut plus rien melanger tchur
    // $(document).ready(function() {
    //   // Effectuez une requête AJAX vers l'URL correspondant à votre action de contrôleur
    //   $.ajax({
    //       url: '/statistique1',
    //     success: function (result1) {
    //         function Mois(i){
    //         if(i == 1)
    //           {
    //             return "Janvier"
    //           }
    //         if(i == 2)
    //           {
    //             return "Fevrier"
    //           }
    //         if(i == 3)
    //           {
    //             return "Mars"
    //           }
    //         if(i == 4)
    //           {
    //             return "Avril"
    //           }
    //         if(i == 5)
    //           {
    //             return "Mai"
    //           }
    //         if(i == 6)
    //           {
    //               return "Juin"
    //           }
    //         if(i == 7)
    //           {
    //             return "Juillet"
    //           }
    //         if(i == 8)
    //           {
    //             return "Aout"
    //           }
    //         if(i == 9)
    //           {
    //             return "Septembre"
    //           }
    //         if(i == 10)
    //           {
    //             return "Octobre"
    //           }
    //         if(i == 11)
    //           {
    //             return "Novembre"
    //           }
    //         if(i == 12)
    //           {
    //             return "Decembre"
    //           }

    //         }
    //       console.log(result1[0]);
    //       const revenueBarChartEl = document.querySelector('#revenueChart');
    //       const data1 = [];
    //       const mois = [];
    //       const annee = [];
    //       // bonjour
    //       for (var i = 0; i < result1.length; i++) {
    //         data1.push(result1[i].count);
    //         mois.push(Mois(result1[i].mois));
    //         annee.push(result1[i].annee);
    //         }


    //   const revenueBarChartConfig = {
    //     chart: {
    //       height: 270,
    //       type: 'bar',
    //       toolbar: {
    //         show: false
    //       }
    //     },
    //     plotOptions: {
    //       bar: {
    //         barHeight: '80%',
    //         columnWidth: '75%',
    //         startingShape: 'rounded',
    //         endingShape: 'rounded',
    //         borderRadius: 2,
    //         distributed: true
    //       }
    //     },
    //     grid: {
    //       show: false,
    //       padding: {
    //         top: -20,
    //         bottom: -12,
    //         left: -10,
    //         right: 0
    //       }
    //     },
    //     colors: [
    //       config.colors_label.primary,
    //       config.colors_label.primary,
    //       config.colors_label.primary,
    //       config.colors_label.primary,
    //       config.colors.primary,
    //       config.colors_label.primary,
    //     config.colors_label.primary
    //     ],
    //     dataLabels: {
    //       enabled: false
    //     },
    //     series: [
    //       {
    //         name: annee,
    //         data: data1
    //       }
    //     ],
    //     legend: {
    //       show: false
    //     },
    //     xaxis: {
    //       categories: mois,
    //       axisBorder: {
    //         show: true
    //       },
    //       axisTicks: {
    //         show: false
    //       },
    //       labels: {
    //         style: {
    //           colors: labelColor,
    //           fontSize: '15px'
    //         }
    //       }
    //     },
    //     yaxis: {
    //       labels: {
    //         show: false
    //     }
    //     }
    //   };
    //   if (typeof revenueBarChartEl !== undefined && revenueBarChartEl !== null) {
    //   const revenueBarChart = new ApexCharts(revenueBarChartEl, revenueBarChartConfig);
    //   revenueBarChart.render();
    //   }
    //           }
    //       });
    // });
  // Fin



  // Session par jours

    $(document).ready(function() {
      $.ajax({
          url: '/Dash/Session/Stat',
          type: 'GET',
          dataType: 'json',
          success: function(response) {
              // Créer le graphique avec les données reçues
              // createChart(response.data, response.labels);

              const date = [];
              const mins = [];

              for (let i = 0; i < response.dates.length; i++) {
                date.push(response.dates[i]);
                mins.push(response.minutes[i]);
              };
              

              const revenueBarChartEl = document.querySelector('#revenueChart'),
                revenueBarChartConfig = {
                  chart: {
                    height: 270,
                    type: 'bar',
                    toolbar: {
                      show: false
                    }
                  },
                  plotOptions: {
                    bar: {
                      barHeight: '80%',
                      columnWidth: '75%',
                      startingShape: 'rounded',
                      endingShape: 'rounded',
                      borderRadius: 2,
                      distributed: true
                    }
                  },
                  grid: {
                    show: false,
                    padding: {
                      top: -20,
                      bottom: -12,
                      left: -10,
                      right: 0
                    }
                  },
                  colors: [
                    config.colors.secondary
                  ],
                  dataLabels: {
                    enabled: false
                  },
                  series: [
                    {
                      data: mins,
                      
                    }
                  ],
                  legend: {
                    show: false
                  },
                  xaxis: {
                    categories: date,
                    axisBorder: {
                      show: true
                    },
                    axisTicks: {
                      show: false
                    },
                    labels: {
                      style: {
                        colors: labelColor,
                        fontSize: '15px'
                      }
                    }
                  },
                  yaxis: {
                    labels: {
                      show: false
                    }
                  }
                };
              if (typeof revenueBarChartEl !== undefined && revenueBarChartEl !== null) {
                const revenueBarChart = new ApexCharts(revenueBarChartEl, revenueBarChartConfig);
                revenueBarChart.render();
              }
              
          },
          error: function(xhr, status, error) {
              console.error(error);
          }
      });
    });
    
  // Fin Session par jours


})();
